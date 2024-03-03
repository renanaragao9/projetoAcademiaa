<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_division extends Model
{
    use HasFactory;
    
    protected $table = 'training_division';

    protected $primaryKey = 'id_training';

    protected $fillable = ['name_training'];

    public function trainingDivision() {
        return $this->hasMany(User::class, 'id_training_fk');
    }
}
