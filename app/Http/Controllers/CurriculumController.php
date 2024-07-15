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
        $date = now()->format('Y-m-d'); // 現在の日付を取得
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
        $date = now()->format('Y-m-d'); // 現在の日付を取得
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

    public function showCurriculumByDate(Request $request, $date)
    {
        $gradeId = $request->input('gradeId', 1); // デフォルトは1
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

        $grades = Grade::all();
        $currentGrade = Grade::find($gradeId); // 選択された学年を取得
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