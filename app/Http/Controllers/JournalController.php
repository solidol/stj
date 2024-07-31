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
    function index()
    {
        $user = Auth::user();
        $journals = $user->userable->group->journalss();
        $messages = [];
        return view('journals.index', [
            'journals' => $journals,
        ]);
    }

    function show(Journal $journal)
    {
        $user = Auth::user();
        $journals = $user->userable->group->journals;
        return view('journals.show', [
            'currentJournal' => $journal,
            'journals' => $journals
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
