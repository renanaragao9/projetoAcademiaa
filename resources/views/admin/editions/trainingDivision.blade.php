@extends('layouts.admin')

@section('title', 'Edição da Divisão de')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form class="col s12" id="form_group_muscle" action="{{ route('admin.edit.training.update', $training->id_training)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">                  
                <div class="input-field col s12 l12">
                  <h3 id="homeTitle" class="center">Editar <br> Divisão de Treino</h3>
                  <h4 id="homeTitle" class="center"> ({{$training->name_training}}) </h4>
                </div>

                <input type="hidden" name="id_training" value="{{$training->id_training}}">

                <div class="input-field col s12 l12">
                  <input name="name_training" type="text" class="validate" id="icon-nome" value="{{$training->name_training}}" required>
                  <label for="icon-nome">Nome:</label>
                </div>

                <div class="input-field col s12 l12">      
                  <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                    <i class="material-icons right">save</i>
                  </button>
                    
                  <a href="{{ route('admin.table.training') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
        
                  <div class="input-field col s12 l12">
                    <a href="{{ route('admin.table.training') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
      <p>Deseja realmente editar o grupo muscular ({{$training->name_training}}) ?</p>
      <p class="warning-modal">* A edição pode acarretar em mudanças nas fichas já criadas</p>
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

      let form = document.querySelector('#form_group_muscle');

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