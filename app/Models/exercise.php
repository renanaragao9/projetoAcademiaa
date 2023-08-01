<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $primaryKey = 'id_exercise';

    protected $fillable = ['name_exercise', 'image_exercise', 'id_gmuscle_fk'];

    public function muscle_group() {
        return $this->belongsTo('App\Models\muscle_group');
    }
}
