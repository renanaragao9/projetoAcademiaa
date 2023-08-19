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
}
