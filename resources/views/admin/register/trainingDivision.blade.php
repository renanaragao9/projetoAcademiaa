@extends('layouts.admin')

@section('title', 'Cadastro da Divisão de Treino')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form class="col s12" id="form_group_muscle" action="{{ route('admin.register.training.create') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">                  
                <div class="input-field col s12 l12">
                  <h3 id="homeTitle" class="center">Cadastrar <br> Divisão de Treino</h3>
                </div>

                <div class="input-field col s12 l12">
                  <input name="name_training" type="text" class="validate" id="icon-nome" required>
                  <label for="icon-nome"><h11>*</h11> Nome:</label>
                </div>

                <div class="input-field col s12 l12">      
                  <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                    <i class="material-icons right">save</i>
                  </button>
                    
                  <a href="{{ route('admin.table.training') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
        
                  <div class="input-field col s12 l12">
                    <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
      <h4>Confirmação de Cadastro</h4>
      <p>Deseja realmente cadastrar a divisão de treino ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Cadastrar</a>
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

  </script>
@endsection