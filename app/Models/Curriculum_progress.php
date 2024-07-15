<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum_progress extends Model
{
    use HasFactory;
    protected $table='curriculum_progress';
    protected $fillable=['curriculum_progress'];
}
