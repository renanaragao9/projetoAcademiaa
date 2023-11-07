<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistics extends Model
{
    use HasFactory;

    protected $table = 'statistics';

    protected $primaryKey = 'id_statistic';

    protected $fillable = ['id_user_fk', 'id_ficha_fk'];

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'id_ficha_fk');
    }
}
