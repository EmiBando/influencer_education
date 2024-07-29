<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userTop()
    {
        return view('user.user_top');
    }
    
    public function userProgress()
    {
        return view('user.user_progress');
    }

    public function userProfile()
    {
        return view('user.user_profile');
    }

    public function showUserTimetable()
    {
        $curriculums = Curriculum::all();
        return view('user.user_timetable', ['curriculums' => $curriculums]);
    }
}
