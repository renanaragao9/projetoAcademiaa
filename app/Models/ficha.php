<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $primaryKey = 'id_ficha';

    protected $fillable = ['order','serie', 'repetition', 'weight', 'rest', 'description', 'id_exercise_fk', 'id_gmuscle_fk_to_ficha', 'id_user_fk', 'id_user_creator_fk', 'id_training_fk'];

    public function exercise() {
        return $this->belongsTo(exercise::class, 'id_exercise_fk');
    }

    public function muscleGroup() {
        return $this->belongsTo(muscleGroup::class, 'id_gmuscle_fk_to_ficha');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user_fk');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'id_user_creator_fk');
    }

    public function training() {
        return $this->belongsTo(training_division::class, 'id_training_fk');
    }
}
