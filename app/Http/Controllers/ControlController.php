<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Control;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Library\CalendarHelper;

class ControlController extends Controller
{

    function index($id)
    {
        $journal = Auth::user()->userable->journals->find($id);
        if ($journal == null)
            return view('noelement');
        return view('controls.index', [
            'lesson' => false,
            'currentJournal' => $journal,
            'journals' => Auth::user()->userable->journals()->with('group')->get()->sortBy('group.title')
        ]);
    }



    function show(Control $control)
    {
        if (\request()->ajax()) {
            if (!$control->date_) $control->date_ = "2000-01-01";
            return response()->json($control);
        }

        if ($control->journal->teacher_id == Auth::user()->userable_id) 
        {

            $journals = Auth::user()->userable->journals()->with('group')->get()->sortBy('group.title');

            switch ($control->max_grade){
                case -2: $view = 'practices.show'; break;
                default:  $view = 'controls.show';
            }
            return view($view, [
                'lesson' => false,
                'currentJournal' => $control->journal,
                'journals' => $journals,
                'currentControl' => $control
            ]);
        } else {
            return view('noelement');
        }
    }

    function store(Request $request)
    {
        if ($request->journal_id < 1) {
            Session::flash('error', 'Контроль не створено! Не вистачає даних!');
            return redirect()->route('journals.index');
        }
        $journal = Journal::find($request->journal_id);
        $maxval = $request->maxval;
        switch ($maxval) {

            case 'З':
            case 'з':
            case 'Зар':
            case 'зар':
                $maxval = -2;
                break;
            default:
                break;
        }
        if (!is_numeric($maxval)) $maxval = 0;

        if ($journal->controls()->where('title', $request->title)->get()->first()) {
            Session::flash('error', 'Контроль вже існує!');
            return redirect()->route('marks.index', ['id' => $journal->id]);
        }
        $control = $journal->controls()->create([
            'date_' => $request->date_control,
            'title' => $request->title,
            'max_grade' => $maxval,
            'type_' => $request->control_type,
            'description' => $request->description
        ]);
        $control->marks()->create([
            'kod_prep' => $journal->teacher_id,
            'kod_subj' => $journal->subject_id,
            'kod_grup' => $journal->group_id,
            'kod_stud' => 0,
            'data_' => $control->date_,
            'vid_kontrol' => $control->title,
            'type_kontrol' => $request->control_type,
            'ocenka' => $maxval,
            'journal_id' => $journal->id,
        ]);

        Session::flash('message', 'Контроль ' . $control->title . ' успішно створено!');
        return redirect()->route('controls.show', ['control' => $control]);
    }

    function destroy(Control $control)
    {
        Session::flash('message', 'Контроль ' . $control->title . ' успішно видалено!');
        $journal_id = $control->journal_id;
        $control->marks()->delete();
        $control->marksHeader()->delete();
        $control->delete();
        return redirect()->route('marks.index', ['id' => $journal_id]);
    }

    function update(Request $request)
    {
        if ($request->control_id < 1) {
            Session::flash('error', 'Контроль не оновлено! Не вистачає даних!');
            return redirect()->route('journals.index');
        }
        $control = Control::find($request->control_id);
        $control->update([
            'title' => $request->title,
            'date_' => $request->edited_date,
            'type_' => $request->typecontrol,
            'max_grade' => $request->max_grade,
        ]);
        $control->marks()->update([
            'vid_kontrol' => $request->title,
            'data_' => $request->edited_date,
            'type_kontrol' => $request->typecontrol
        ]);
        $control->marksHeader()->update([
            'vid_kontrol' => $request->title,
            'data_' => $request->edited_date,
            'type_kontrol' => $request->typecontrol,
            'ocenka' => $request->max_grade,
        ]);
        return redirect()->route('controls.show', ['control' => $control]);
    }


}
