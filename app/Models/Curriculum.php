<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Curriculum;
use App\Models\Grade;

class Curriculum extends Model
{
    use HasFactory;
    protected $table='curriculums';

    public function grade():BelongsTo{
        return $this->belongsTo(Grade::class);
    }
    public function author():BelongsToMany{
        return $this->belongsToMany(Author::class);
    }
}
