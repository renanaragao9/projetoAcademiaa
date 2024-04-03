<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $primaryKey = 'id_expense';

    protected $fillable = ['tipo_expense', 'data_expense', 'value_expense', 'description_expense', 'observation_expense', 'user_id','created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(user::class, 'user_id');
    }

}

