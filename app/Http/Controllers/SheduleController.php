<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Shedule;
use Illuminate\Http\Request;
use Auth;

class SheduleController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        if ($user->isStudent()) {
            return view('shedules.show', ['student' => $user->userable]);
        }

        return view('noelement');

    }
}
