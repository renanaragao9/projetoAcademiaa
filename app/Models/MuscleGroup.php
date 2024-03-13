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
        return $this->hasMany(Exercise::class, 'gmuscle_id');
    }

    public function fichas() {
        return $this->hasMany(Ficha::class, 'gmuscle_id');
    }
}
