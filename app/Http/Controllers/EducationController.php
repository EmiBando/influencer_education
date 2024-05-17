<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Banner;
use App\Models\Article;
use App\Models\Curriculum;
use App\Models\Grade;
use App\Models\Users;
use App\Models\Curriculum_progress;


class EducationController extends Controller
{
    public function user_top(Request $request,Users $users,Banner $banner,Article $article):View{
        $users=Users::query();
        $banners=Banner::all();
        $articles=Article::orderBy('id','desc')->limit(5)->get();
        return view('user/user_top',['banners'=>$banners,'articles'=>$articles]);
    }
    public function stream(Request $request,Curriculum $curriculum,Grade $grade):View{
        // $curriculums=Curriculum::all();
        $curriculum=Curriculum::find(1);
        return view('stream',['curriculum'=>$curriculum,'grade'=>$grade]);
    }
    public function lavel_chenge(Request $request,Curriculum_progress $curriculum_progress){

        $curriculum_progress=Curriculum_progress::find(1);
       
        return response()->json(['curriculum_progress' => $curriculum_progress]);
        
    }
}
