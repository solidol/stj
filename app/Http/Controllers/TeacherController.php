<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function avatar($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher->image && Storage::disk('public')->exists($teacher->image))
            return Storage::disk('public')->download($teacher->image);

        return Storage::disk('public')->download('system/np_n.jpg');

    }

    public function index()
    {
        $teachers = Auth::user()->userable->group->teachers()->orderBy('FIO_prep')->get();
        $group = Auth::user()->userable->group;
        return view('teachers.index', [
            'teachers' => $teachers,
            'group' => $group,
        ]);
    }

    public function show(Teacher $teacher){
        $group = Auth::user()->userable->group;
        return view('teachers.show', [
            'teacher' => $teacher,
            'group' => $group,
        ]);
    }
}
