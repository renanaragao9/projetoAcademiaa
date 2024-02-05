<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\media;

class MediaController extends Controller
{
    public function show_media_table() {
        $medias = media::with('user_id')->orderBy('id_media', 'ASC')->get();
    }

    public function create() {
        
    }
}
