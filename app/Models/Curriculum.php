<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';

    public function userTimetable() {
        $curriculums = DB::table('curriculums')->get();
        return $curriculums;
    }
    
}