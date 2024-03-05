<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDivision extends Model
{
    use HasFactory;
    
    protected $table = 'training_division';

    protected $primaryKey = 'id_training';

    protected $fillable = ['name', 'observation'];

    public function trainingDivision() {
        return $this->hasMany(User::class, 'id_training_fk');
    }
}
