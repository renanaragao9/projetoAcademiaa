@extends('layouts.admin')

@section('title', 'Chamados')

@section('content')
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="col s12">
          <div class="row">
            <div class="col s12 l12">
              <h3 class="center col s12 l12" id="homeTitle">Chamados</h3>
              <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l3" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
            </div>
          </div>
        </div>

        @foreach ($calleds as $called)
          <ul class="collection">
            <li class="collection-item avatar">
              <img src="/img/profile_photo_path/{{$called->user_photo }}" class="circle responsive-img" alt="Imagem de Perfil" class="circle" id="called_photo">
              <span class="title"> <strong id="strong">Nome:</strong> {{ $called->user_name }} </span>
              <p><strong id="strong">Urgencia:</strong> {{  $called->urgency }}</p>
              <p><strong id="strong">Titulo:</strong> {{ $called->title }}</p>
              <p><strong id="strong">Assunto:</strong> {{ $called->subject }}</p>
              <p><strong id="strong">Professor:</strong> {{ $called->instrutor_name }}</p>                  
              <form action="{{ route('admin.called.destroy', $called->id_called) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $called->id_called }}">
                <button class="btn-floating tooltipped red darken-4 btn-small waves-effect waves-light green right delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Resolver"><i class="material-icons">check_circle</i></button>
              </form>
            </li>                            
          </ul>
        @endforeach
      </div>
    </div>
  </div> 

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Chamado</h4>
      <p>Deseja realmente resolver o chamado ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Sim</a>
    </div>
  </div>
@endsection

@section('script')
  <script> 
    // Inicio da função do alerta modal ao excluír dados
    document.addEventListener('DOMContentLoaded', function() {
      
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let deleteButtons = document.querySelectorAll('.delete-button');

      deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          let form = button.closest('.delete-form');
          instance.open();

          let cancelBtn = document.querySelector('.modal-footer #cancelBtn');
          cancelBtn.addEventListener('click', function() {
            instance.close();
          });

          let confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
          confirmDeleteBtn.addEventListener('click', function() {
            form.submit();
            instance.close();
          });
        });
      });
    });  
  </script>
@endsection