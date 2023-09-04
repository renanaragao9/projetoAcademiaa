<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
    use HasFactory;

    protected $table = 'assessments';

    protected $primaryKey = 'id_assessment';

    protected $fillable = ['goal', 'observation', 'term', 'height', 'weight', 'arm', 'forearm', 'shoulder', 'breastplate', 'waist', 'abdomen', 'hip', 'thigh', 'calf', 'id_user_fk', 'observation'];
}
