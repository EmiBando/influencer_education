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
        $date = now()->format('Y-m-d');
        $startOfMonth = Carbon::parse($date)->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::parse($date)->endOfMonth()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        $curriculums = Curriculum::where('grade_id', $initialGradeId)
            ->where(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('always_delivery_flg', 1)
                    ->orWhere(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                        $query->whereHas('deliveryTimes', function ($query) use ($startOfMonth, $endOfMonth, $today) {
                            $query->where('delivery_from', '<=', $endOfMonth)
                                ->where('delivery_to', '>=', $startOfMonth)
                                ->where('delivery_from', '<=', $today)
                                ->where('delivery_to', '>=', $today);
                        });
                    });
            })
            ->with(['deliveryTimes' => function($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('delivery_from', '<=', $endOfMonth)
                    ->where('delivery_to', '>=', $startOfMonth)
                    ->where('delivery_from', '<=', $today)
                    ->where('delivery_to', '>=', $today);
            }])
            ->get();

        $grades = Grade::all();
        $currentGrade = Grade::find($initialGradeId);
        $selectedDate = Carbon::parse($date)->format('Y-m-d');

        return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
    }

    public function showCurriculumByGrade($gradeId, $date)
    {
        $startOfMonth = Carbon::parse($date)->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::parse($date)->endOfMonth()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        $curriculums = Curriculum::where('grade_id', $gradeId)
            ->where(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('always_delivery_flg', 1)
                    ->orWhere(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                        $query->whereHas('deliveryTimes', function ($query) use ($startOfMonth, $endOfMonth, $today) {
                            $query->where('delivery_from', '<=', $endOfMonth)
                                ->where('delivery_to', '>=', $startOfMonth)
                                ->where('delivery_from', '<=', $today)
                                ->where('delivery_to', '>=', $today);
                        });
                    });
            })
            ->with(['deliveryTimes' => function ($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('delivery_from', '<=', $endOfMonth)
                    ->where('delivery_to', '>=', $startOfMonth)
                    ->where('delivery_from', '<=', $today)
                    ->where('delivery_to', '>=', $today);
            }])
            ->get();

        $grades = Grade::all();
        $currentGrade = Grade::find($gradeId);
        $selectedDate = Carbon::parse($date)->format('Y-m-d');

        return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
    }

    public function showCurriculumByDate($date, $gradeId)
    {
        $startOfMonth = Carbon::parse($date)->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::parse($date)->endOfMonth()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        $curriculums = Curriculum::where('grade_id', $gradeId)
            ->where(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('always_delivery_flg', 1)
                    ->orWhere(function ($query) use ($startOfMonth, $endOfMonth, $today) {
                        $query->whereHas('deliveryTimes', function ($query) use ($startOfMonth, $endOfMonth, $today) {
                            $query->where('delivery_from', '<=', $endOfMonth)
                                ->where('delivery_to', '>=', $startOfMonth)
                                ->where('delivery_from', '<=', $today)
                                ->where('delivery_to', '>=', $today);
                        });
                    });
            })
            ->with(['deliveryTimes' => function ($query) use ($startOfMonth, $endOfMonth, $today) {
                $query->where('delivery_from', '<=', $endOfMonth)
                    ->where('delivery_to', '>=', $startOfMonth)
                    ->where('delivery_from', '<=', $today)
                    ->where('delivery_to', '>=', $today);
            }])
            ->get();

        $grades = Grade::all();
        $currentGrade = Grade::find($gradeId);
        $selectedDate = Carbon::parse($date)->format('Y-m-d');

        return view('user.user_timetable', compact('curriculums', 'grades', 'currentGrade', 'selectedDate'));
    }
}
