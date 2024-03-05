<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    use HasFactory;
    
    protected $table = 'muscle_group';

    protected $primaryKey = 'id_gmuscle';

    protected $fillable = ['name', 'observation'];

    public function exercises() {
        return $this->hasMany(exercise::class, 'id_gmuscle_fk');
    }
}
