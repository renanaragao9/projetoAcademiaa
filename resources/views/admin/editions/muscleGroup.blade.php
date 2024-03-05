@extends('layouts.admin')

@section('title', 'Edição do Grupo Muscular')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form class="col s12" id="form_edit" action="{{ route('admin.groupmuscle.update', $muscleGroup->id_gmuscle)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="row">                  
                <div class="input-field col s12 l12">
                  <h3 id="pageTitle" class="center">Editar <br> Grupo Muscular</h3>
                  <h4 id="pageSub_Title" class="center">({{$muscleGroup->name}})</h4>
                </div>

                <input type="hidden" name="id_gmuscle" value="{{$muscleGroup->id_gmuscle}}">

                <div class="input-field col s12 l12">
                  <input name="name" type="text" class="validate" id="name" value="{{$muscleGroup->name}}" >
                  <label for="name">Nome:</label>
                </div>

                <div class="input-field col s12 l12">
                  <input name="observation" type="text" class="validate" id="observation" value="{{$muscleGroup->observation}}" >
                  <label for="observation">Observação:</label>
                </div>

                <div class="input-field col s12 l12">      
                  <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                    <i class="material-icons right">save</i>
                  </button>
                    
                  <a href="{{ route('admin.groupmuscle.index') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Lista</a>
        
                  <div class="input-field col s12 l12">
                    <a href="{{ route('admin.groupmuscle.index') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
      <p>Deseja realmente editar o grupo muscular ({{$muscleGroup->name}}) ?</p>
      <p class="warning-modal">* A edição pode acarretar em mudanças nos exercícios já criados</p>
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

      let form = document.querySelector('#form_edit');

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
  </script>

@endsection