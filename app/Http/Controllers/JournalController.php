<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Journal;
use App\Models\Lesson;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DateTime;

class JournalController extends Controller
{
    function index($group = false)
    {
        $user = Auth::user();
        $groups = DB::table('grups')->orderBy('nomer_grup')->get();
        $subjects = DB::table('subjects')->orderBy('subject_name')->get();
        if (!$group) {
            $journals = $user->userable->journals()->with('group')->get()->sortBy('group.title');
        } else {
            $journals = $user->userable->journals()->where('group_id', $group)->with('group')->get()->sortBy('group.title');
        }
        $messages = Message::where('to_id', 0)
            ->where('message_type', 'text')
            ->whereDate('datetime_end', '>', (new DateTime())->format('Y-m-d h:m:s'))
            ->whereDate('datetime_start', '<', (new DateTime())->format('Y-m-d h:m:s'))
            ->get();

        return view('journals.index', [
            'messages' => $messages,
            'data' => array('prep' => $user->userable_id),
            'journals' => $journals,
            'grList' => $groups,
            'sbjList' => $subjects,
        ]);
    }

    function studentMarks($id = false)
    {
        if ($id) {
            $journal = Auth::user()->userable->group->journals->find($id);
        } else {
            $journal = false;
        }
        if ($journal == null) {
            $journal = false;
        }
        $journals = Auth::user()->userable->group->journals()->with('subject')->get()->sortBy('subject.subject_name');
        return view('student.marks.index', [
            'lesson' => false,
            'currentJournal' => $journal,
            'journals' => $journals
        ]);
    }



    function marksSheet($id)
    {
        $journal = Auth::user()->userable->journals->find($id);
        if ($journal == null)
            return view('noelement');
        return view('teacher.marks_show', [
            'lesson' => false,
            'currentJournal' => $journal,
            'journals' => Auth::user()->userable->journals()->with('group')->get()->sortBy('group.title')
        ]);
    }

}
