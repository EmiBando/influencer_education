<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Banner;
use App\Models\Article;
use App\Models\Curriculum;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum_progress;


class EducationController extends Controller
{
    public function user_top(Request $request,User $users,Banner $banner,Article $article):View{
        $user=Auth::id();
        $banners=Banner::all();
        $articles=Article::orderBy('id','desc')->limit(5)->get();
        return view('user/user_top',['banners'=>$banners,'articles'=>$articles,'user'=>$user]);
    }
    public function stream(Request $request,User $user,Curriculum $curriculum,Grade $grade,Curriculum_progress $curriculum_progress):View{
        // $curriculums=Curriculum::all();
        $user=Auth::id();
       
        $curriculum=Curriculum::find(1);  //curriculum_id=1と仮定
  
        $curriculum_progress=Curriculum_progress::where('users_id',$user)->where('curriculums_id',$curriculum->id)->first();
        // $curriculum_progress=Curriculum_progress::where('users_id',3)->where('curriculumus_id',1)->first();

        $grade=Grade::all();
        return view('user/stream',['curriculum'=>$curriculum,'grade'=>$grade,'user'=>$user,'curriculum_progress'=>$curriculum_progress]);
    }
    public function lavel_chenge(Request $request,User $user,Curriculum_progress $curriculum_progress){
        
        $user_id=Auth::id();

        $curriculum=Curriculum::find(1);
  
        $curriculum_progress=Curriculum_progress::where('users_id',$user_id)->where('curriculums_id',$curriculum->id)->first();
      
        try{
            DB::beginTransaction();
            if($curriculum_progress->clear_flg==0){
                
                $curriculum_progress->clear_flg=1;
            }
            
            $curriculum_progress->save();
            DB::commit();
            return response()->json(['curriculum_progress' => $curriculum_progress]);

        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
        
    }
}
