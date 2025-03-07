@extends('layouts.admin')

@section('title', 'Editar exercício: ' . $exercises->name_exercise)

@section('content')   
    
  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form class="col s12" id="form_exercise" action="{{ route('admin.edit.exercise.update', $exercises->id_exercise) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="input-field col s12 l12" id="input-exercicio">
                  <h3 class="center" id="homeTitle">Editar <br> Exercício</h3>
                  <h4 class="center" id="homeTitle">({{ $exercises->name_exercise }})</h4>

                  <input type="hidden" name="id_exercise" value="{{ $exercises->id_exercise }}">
                </div>
                
                <div class="input-field col s12 l12" id="input-exercicio">
                  <input name="name_exercise" type="text" class="validate" id="icon-nome" value="{{ $exercises->name_exercise }}" required>
                  <label for="icon-nome"><h11>*</h11> Nome:</label>
                </div>

                <div class="input-field col s12">
                  <select name="id_gmuscle_fk" class="browser-default" required>
                    <option selected disabled>Selecione o Grupo Muscular:</option>
                    
                    @foreach ($muscleGroups as $muscleGroup)
                        <option value="{{ $muscleGroup->id_gmuscle }}" {{$exercises->id_gmuscle_fk == $muscleGroup->id_gmuscle ? "selected='selected'" : "" }}>{{ $muscleGroup->name_gmuscle }}</option>
                    @endforeach          
                  </select>
                  <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Grupo Muscular</label>
                </div>

                <div class="file-field col s12 l12">
                  <div class="btn light-blue darken-4">
                      <span>Imagem</span>
                      <input name="image_exercise" type="file" class="validate" multiple>
                  </div>
                  
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" value="{{$exercises->image_exercise}}" placeholder="Faça o download da imagem">
                  </div>
                </div>

                <div class="file-field col s12 l12">
                  <div class="btn light-blue darken-4">
                      <span>GIF</span>
                      <input name="gif_exercise" type="file" class="validate" multiple>
                  </div>
                  
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" value="{{$exercises->gif_exercise}}" placeholder="Faça o download da imagem">
                  </div>
                </div>

                <div class="input-field col s12 l6" id="input-exercicio">
                  <img src="{{ $exercises->image_exercise ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('img/exercise/') . $exercises->image_exercise)) : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('img/exercise/default_image.jpg'))) }}" alt="" class="materialboxed" id="card-form-edit-image">
                </div>

                <div class="input-field col s12 l6" id="input-exercicio">
                  <img src="{{ $exercises->gif_exercise ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('img/exercise/gif/') . $exercises->gif_exercise)) : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('img/exercise/gif/default_gif.jpg'))) }}" alt="" class="materialboxed" id="card-form-edit-image">
                </div>

                <div class="input-field col s12 l12">      
                  <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                    <i class="material-icons right">save</i>
                  </button>
                    
                  <a href="{{ route('admin.table.exercise') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
        
                  <div class="input-field col s12 l12">
                    <a href="{{ route('admin.table.exercise') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                  </div>
                </div>
              </div>
            </form>
          </div>    
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Edição</h4>
      <p>Deseja realmente editar o exercício: ({{$exercises->name_exercise}}) ?</p>
      <p class="warning-modal">* A edição pode acarretar em mudanças nos exercícios das fichas já criadas</p>
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

      let form = document.querySelector('#form_exercise');

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
    
    {{-- 
      o modal é estilizado usando as classes CSS fornecidas pelo Materialize CSS. Usamos a função M.Modal.init() para inicializar o modal e a função instance.open() para abrir o modal quando o formulário for submetido.
      o evento submit é usado para interceptar o envio do formulário, e o modal é aberto nesse momento. Quando o botão "Enviar" dentro do modal é clicado, o formulário é enviado utilizando form.submit(). 
      --}}
  </script>

@endsection