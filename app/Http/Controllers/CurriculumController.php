<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CurriculumController extends Controller
{
    public function userTimetable()
    {
        $initialGradeId = 1;
        $date = '2024-07-01'; // 初期表示の日付
        $curriculums = Curriculum::where('grade_id', $initialGradeId)
                                 ->whereHas('deliveryTimes', function ($query) use ($date) {
                                     $query->whereMonth('delivery_from', Carbon::parse($date)->month)
                                           ->whereYear('delivery_from', Carbon::parse($date)->year);
                                 })
                                 ->with(['deliveryTimes' => function($query) use ($date) {
                                     $query->whereMonth('delivery_from', Carbon::parse($date)->month)
                                           ->whereYear('delivery_from', Carbon::parse($date)->year);
                                 }])
                                 ->get();
        $grades = Grade::all();
        $currentGrade = Grade::find($initialGradeId);
        $selectedDate = Carbon::parse($date)->format('Y-m-d');

        return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
    }

    public function showCurriculumByGrade($gradeId)
    {
        $date = '2024-07-01'; // 初期表示の日付
        $curriculums = Curriculum::where('grade_id', $gradeId)
                                 ->whereHas('deliveryTimes', function ($query) use ($date) {
                                     $query->whereMonth('delivery_from', Carbon::parse($date)->month)
                                           ->whereYear('delivery_from', Carbon::parse($date)->year);
                                 })
                                 ->with(['deliveryTimes' => function($query) use ($date) {
                                     $query->whereMonth('delivery_from', Carbon::parse($date)->month)
                                           ->whereYear('delivery_from', Carbon::parse($date)->year);
                                 }])
                                 ->get();
        $grades = Grade::all();
        $currentGrade = Grade::find($gradeId);
        $selectedDate = Carbon::parse($date)->format('Y-m-d');

        return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
    }

    public function showCurriculumByDate($date)
{
    // 月の範囲を計算
    $startOfMonth = Carbon::parse($date)->startOfMonth()->format('Y-m-d');
    $endOfMonth = Carbon::parse($date)->endOfMonth()->format('Y-m-d');
    
    // 初期表示時はGrade1のスケジュールのみ取得
    $curriculums = Curriculum::where('grade_id', 1)
                             ->whereHas('deliveryTimes', function ($query) use ($startOfMonth, $endOfMonth) {
                                 $query->whereBetween('delivery_from', [$startOfMonth, $endOfMonth]);
                             })
                             ->with(['deliveryTimes' => function($query) use ($startOfMonth, $endOfMonth) {
                                 $query->whereBetween('delivery_from', [$startOfMonth, $endOfMonth]);
                             }])
                             ->get();

    $grades = Grade::all();
    $currentGrade = Grade::first(); // 初期表示時はGrade1を選択
    $selectedDate = Carbon::parse($date)->format('Y-m-d');

    return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
}


    public function getSchedule(Request $request)
    {
        $date = $request->input('date');
        $gradeId = $request->input('gradeId');

        $startOfMonth = Carbon::parse($date)->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::parse($date)->endOfMonth()->format('Y-m-d');

        $curriculums = Curriculum::where('grade_id', $gradeId)
                                 ->whereHas('deliveryTimes', function ($query) use ($startOfMonth, $endOfMonth) {
                                     $query->whereBetween('delivery_from', [$startOfMonth, $endOfMonth]);
                                 })
                                 ->with(['deliveryTimes' => function($query) use ($startOfMonth, $endOfMonth) {
                                     $query->whereBetween('delivery_from', [$startOfMonth, $endOfMonth]);
                                 }])
                                 ->get();

        return response()->json(['curriculums' => $curriculums]);
    }
}
