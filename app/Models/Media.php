<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $primaryKey = 'id_media';

    protected $fillable = ['type_media', 'img_media', 'link_media', 'title_media', 'description_media', 'tags_media', 'id_user_fk'];

    public function users() {
        return $this->belongsTo(user::class, 'id_user_fk');
    }
}
