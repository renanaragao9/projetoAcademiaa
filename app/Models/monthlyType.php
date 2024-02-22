<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthlyType extends Model
{
    use HasFactory;

    protected $table = 'monthly_type';

    protected $primaryKey = 'id_monthly_type';

    protected $fillable = ['name_monthly', 'value', 'months', 'observation', 'created_at', 'updated_at'];

    public function payment() {
        return $this->hasMany(payment::class, 'monthly_type_id');
    }  
}
