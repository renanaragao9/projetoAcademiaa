<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;

    protected $table = 'paymentes';

    protected $primaryKey = 'id_payment';

    protected $fillable = ['type_payment', 'date_payment', 'value_payment', 'monthly_type_id', 'user_id_fk', 'user_creator_fk', 'created_at', 'modified_at'];
}
