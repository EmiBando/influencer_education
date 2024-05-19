<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Grade;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function userTimetable()
    {
        $initialGradeId = 1;
        $date = '2024-07-13'; // 初期表示の日付
        $curriculums = Curriculum::where('grade_id', $initialGradeId)
                                 ->with(['deliveryTimes' => function($query) use ($date) {
                                     $query->whereDate('delivery_from', $date);
                                 }])
                                 ->get();
        $grades = Grade::all();
        $currentGrade = Grade::find($initialGradeId);

        return view('user_timetable', compact('curriculums', 'grades', 'currentGrade'));
    }

    public function showCurriculumByGrade($gradeId)
    {
        $date = '2024-07-13'; // 初期表示の日付
        $curriculums = Curriculum::where('grade_id', $gradeId)
                                 ->with(['deliveryTimes' => function($query) use ($date) {
                                     $query->whereDate('delivery_from', $date);
                                 }])
                                 ->get();
        $grades = Grade::all();
        $currentGrade = Grade::find($gradeId);

        return view('user_timetable', compact('curriculums', 'grades', 'currentGrade'));
    }

    public function getSchedule(Request $request)
    {
        $date = $request->input('date');
        $gradeId = $request->input('gradeId');

        $curriculums = Curriculum::where('grade_id', $gradeId)
                                 ->with(['deliveryTimes' => function($query) use ($date) {
                                     $query->whereDate('delivery_from', $date);
                                 }])
                                 ->get();

        return response()->json(['curriculums' => $curriculums]);
    }
}