<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $primaryKey = 'id_media';

    protected $fillable = ['tipo_media', 'img_media', 'link_media', 'title_media', 'description_media', 'tags_media', 'user_id'];
}
