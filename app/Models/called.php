<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class called extends Model
{
    use HasFactory;

    protected $table = 'calleds';

    protected $primaryKey = 'id_called';

    protected $fillable = ['user_name', 'urgency', 'title', 'subject', 'id_instructor_fk', 'id_user_fk', 'created_at', 'updated_at'];
}
