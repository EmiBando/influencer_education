<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Grade extends Model
{
    use HasFactory;

    public function curriculums()
    {
    return $this->hasMany(Curriculum::class, 'grade_id');
    }

    public static function getUserGradesWithCurriculums()
    {
        $user = Auth::user();
        return self::with(['curriculums' => function ($query) use ($user) {
            $query->with(['progress' => function ($q) use ($user) {
                $q->where('users_id', $user->id);
            }])
            ->with(['deliveryTimes' => function ($q) {
                $q->where('delivery_from', '<=', now())
                  ->where('delivery_to', '>=', now());
            }]);
        }])->get();
    }
}
