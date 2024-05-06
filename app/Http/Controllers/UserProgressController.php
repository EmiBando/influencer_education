<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use Carbon\Carbon;

class UserProgressController extends Controller
{

    public function index()
    {
        return view('user.progress', [
            'user' => auth()->user(),
            'grades' => Grade::getUserGradesWithCurriculums(),
            'daytime' => now(),
        ]);
    }


    public function stream($id)
    {
    $stream = $id;
    return view('user.stream', compact('stream'));
    }
}
