@extends('layouts.admin')

@section('title', 'Edição de Mídia')

@section('content')
    
  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="form_media" action="{{ route('admin.media.update', $media->id_media) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="input-field col s12 l12" id="input-exercicio">
                <h3 id="homeTitle" class="center">Editar <br> Mídia</h3>
              </div>

              <div class="input-field col s12" id="select-desktop">
                <select name="type_media" class="browser-default" id="select-type" required>
                  <option disabled>Selecione o tipo de publicação:</option>
                  <option value="1" {{$media->type_media == 1 ? "selected='selected'" : "" }}> Banner </option>
                  <option value="2" {{$media->type_media == 2 ? "selected='selected'" : "" }}> Post </option>     
                </select>
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Tipo de Publicação</label>
              </div>

              <div class="file-field col s12 l12" >
                <div class="btn light-blue darken-4" id="select-image">
                  <span>Imagem</span>
                  <input name="img_media" type="file" class="validate">
                </div>

                <div class="file-path-wrapper" id="select-image-input">
                  <input class="file-path" type="text" placeholder="Faça o download da imagem" value="{{ $media->img_media }}">
                </div>
              </div>

              <div class="input-field col s12 l12" id="input-title">
                <input name="title_media" id="icon-titulo" type="text" class="validate" value="{{ $media->title_media }}" required>
                <label for="icon-titulo"><h11>*</h11> Titulo:</label>
              </div>
              
              <div class="input-field col s12 l12" id="input-description">
                <input name="description_media" id="icon-descricao" type="text" class="validate" value="{{ $media->description_media }}">
                <label for="icon-descricao">Descrição:</label>
              </div>

              <div class="input-field col s12 l12" id="input-tag">
                <input name="tags_media" id="icon-tags" type="text" class="validate" value="{{ $media->tags_media }}">
                <label for="icon-tags">Tags:</label>
              </div>
                
              <input type="hidden" name="id_user_fk" id="id_user_fk" value="{{ $media->id_user_fk }}">
              <input type="hidden" name="id_media" id="id_media" value="{{ $media->id_media }}">

              <div class="input-field col s12 l6" id="input-exercicio">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/media/') . $media->img_media)) }}" alt="" class="materialboxed" id="card-form-edit-image">
              </div>

              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.table.media') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                </div>
            </div>
          </form>
        </div>    
      </div>
    </div>
  </div>

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
        <i class="material-icons" id="modal-icon-alert">info</i>
        <h4>Confirmação da Publicação</h4>
        <p>Deseja realmente editar a publicação ?</p>
    </div>

    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Editar</a>
    </div>
  </div>

<!-- Fim de conteudo -->
@endsection

@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let form = document.querySelector('#form_media');

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        instance.open();
      });

      let cancelBtn = document.querySelector('.modal-footer .modal-close');

      cancelBtn.addEventListener('click', function() {
        instance.close();
      });

      let sendBtn = document.getElementById('sendBtn');

      sendBtn.addEventListener('click', function() {
        form.submit();
      });
    });

    selected = document.getElementById("select-type")
    
    selected.addEventListener('change', function() {
    
      if(selected.value == 1) {
        document.getElementById("input-link").style.display = 'none'
        document.getElementById("input-description").style.display = 'none'
        document.getElementById("input-tag").style.display = 'none'
      
      } else {
        document.getElementById("input-link").style.display = 'block'
        document.getElementById("input-description").style.display = 'block'
        document.getElementById("input-tag").style.display = 'block'
      }
    });

    let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if (larguraTela > 700) {
      $("#select-type").removeClass("browser-default");
    }

  </script>

@endsection