<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\media;
use App\Models\user;

class MediaController extends Controller
{
    public function show_media_table() {
        
        $medias_banners = media::with('users')->where('type_media', 1)->orderBy('id_media', 'ASC')->get();
        $medias_post = media::with('users')->where('type_media', 2)->orderBy('id_media', 'ASC')->get();

        return view('admin.table.media', ['medias_banners' => $medias_banners, 'medias_post' => $medias_post]);
    }

    public function create() {

        return view('admin.register.media');
    }

    public function store(Request $request) {
        
        // Verificar se já existem 5 mídias do tipo 1
        $countType1Media = media::where('type_media', 1)->count();

        if ($countType1Media >= 5) {
            return redirect()->back()->with('msg-warning', 'Já foram alcançadas as 5 mídias do tipo banner.');
        }
    
        $mediaCreate = new media;
        $mediaCreate->type_media = $request->type_media;
        $mediaCreate->link_media = $request->link_media;
        $mediaCreate->title_media = $request->title_media;
        $mediaCreate->description_media = $request->description_media;
        $mediaCreate->tags_media = $request->tags_media;
        $mediaCreate->id_user_fk = $request->id_user_fk;
        
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

    public function edit($id) {
        
        $media = media::findOrFail($id);

        return view('admin.editions.media', ['media' => $media]);
    }

    public function update(Request $request) {
       
        $mediaUpdate = [
            'type_media' => $request->type_media,
            'link_media' => $request->link_media,
            'title_media' => $request->title_media,
            'description_media' => $request->description_media,
            'tags_media' => $request->tags_media,
            'id_user_fk' => $request->id_user_fk,
        ];
        
        // Image Upload
        if($request->hasFile('img_media') && $request->file('img_media')->isValid()) {
            
            $requestImage = $request->img_media;
    
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/media'), $imageName);
    
            $mediaUpdate['img_media'] = $imageName;
        }
    
        Media::findOrFail($request->id_media)->update($mediaUpdate);
    
        return redirect()->back()->with('msg-success', 'Mídia editada com sucesso!');
    }

    public function destroy($id) {
        
       $media = media::findOrFail($id);
       
       $imageName = $media->img_media;

       // Excluir imagem da pasta pública, se existir
       if (!empty($imageName)) {
           $imagePath = public_path('img/media/').$imageName;
            unlink($imagePath);
        }

   // Excluir exercício do banco de dados
   $media->delete();
       
       return redirect()->back()->with('msg-success', 'Mídia excluída com sucesso!');
   }
}
