<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

    protected $fillable = ['form_payment', 'date_payment', 'date_due_payment', 'value_payment', 'monthly_type_id', 'user_id', 'user_id_creator', 'observation', 'created_at', 'modified_at'];

    public function monthly() {
        return $this->belongsTo(monthlyType::class, 'monthly_type_id');
    }

    public function user() {
        return $this->belongsTo(user::class, 'user_id');
    }
    
    public function userCreator() {
        return $this->belongsTo(user::class, 'user_id_creator');
    }
}
