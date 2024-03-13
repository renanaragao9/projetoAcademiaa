<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $primaryKey = 'id_ficha';

    protected $fillable = ['order','serie', 'repetition', 'weight', 'rest', 'description', 'id_exercise_fk', 'id_gmuscle_fk_to_ficha', 'id_user_fk', 'id_user_creator_fk', 'id_training_fk'];

    public function exercise() {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function muscleGroup() {
        return $this->belongsTo(MuscleGroup::class, 'gmuscle_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fichasCreator() {
        return $this->belongsTo(User::class, 'user_creator_id');
    }

    public function trainingDivision(){
        return $this->belongsTo(TrainingDivision::class, 'training_id');
    }
}
