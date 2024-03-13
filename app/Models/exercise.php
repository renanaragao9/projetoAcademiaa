<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $primaryKey = 'id_exercise';

    protected $fillable = ['name_exercise', 'image_exercise', 'gmuscle_id'];

    public function groupMuscle() {
        return $this->belongsTo(MuscleGroup::class, 'gmuscle_id');
    }

    public function fichas() {
        return $this->hasMany(Ficha::class, 'exercise_id');
    }

}
