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

        return view('admin.register.media');
    }

    public function store(Request $request) {
        
        $teste = $request->all();

        $mediaCreate = new Media;
        $mediaCreate->tipo_media = $request->tipo_media;
        $mediaCreate->link_media = $request->link_media;
        $mediaCreate->title_media = $request->title_media;
        $mediaCreate->description_media = $request->description_media;
        $mediaCreate->tags_media = $request->tags_media;
        $mediaCreate->user_id = $request->user_id;
        
        // Image Upload
        if($request->hasFile('img_media') && $request->file('img_media')->isValid()) {
            
            $requestImage = $request->img_media;

            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/media'), $imageName);

            $mediaCreate->img_media = $imageName;
        }

        $mediaCreate->save();

        return redirect()->back()->with('msg-success', 'Mídia criada com sucesso!');

    }
}
