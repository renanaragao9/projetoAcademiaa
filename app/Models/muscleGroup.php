<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class muscleGroup extends Model
{
    use HasFactory;
    
    protected $table = 'muscleGroup';

    protected $primaryKey = 'id_gmuscle';

    protected $fillable = ['name_gmuscle'];

    public function exercises() {
        return $this->hasMany(exercise::class, 'id_gmuscle_fk');
    }
}
