<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

    protected $fillable = ['form_payment', 'date_payment', 'value_payment', 'monthly_type_id', 'user_id_fk', 'user_creator_fk', 'created_at', 'modified_at'];
}
