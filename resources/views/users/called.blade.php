@extends('layouts.users')

@section('Chamado', 'Painel do Aluno')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form class="col s12" id="form_called" action="{{ route('admin.called.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="input-field col s12 l12" id="input-exercicio">
                  <h3 id="titleColor" class="center">Cadastrar um novo Chamado</h3>
                </div>
                    
                <div class="input-field col s12 l12" id="input-exercicio">
                  <input name="user_name" type="text" class="validate" value="{{ Auth::user()->name }}" readonly required>
                  <label for="icon-nome" id="created_called">Nome:</label>
                </div>

                <div class="input-field col s12">
                  <select name="id_instructor_fk" required>
                    <option selected disabled>Selecione um Professor:</option>
                    
                    @foreach ($teachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach          
                  </select>
                  <label id="created_called">Professor</label>
                </div>

                <div class="input-field col s12 l12">
                  <select name="urgency">
                    <option selected disabled>Selecione uma Urgência:</option>
                    <option value="Urgente">Urgente</option>
                    <option value="Medio">Médio</option>
                    <option value="Leve">Leve</option>
                  </select>
                    <label id="created_called">Urgencia</label>
                </div>

                <div class="input-field col s12 l12" id="input-exercicio">
                  <input name="title" id="title" type="text" class="validate" required>
                  <label for="title" id="created_called">Titulo:</label>
                </div>

                <div class="input-field col s12 l12" id="input-exercicio">
                  <input name="subject" id="subject" type="text" class="validate" placeholder="Faça aqui um resumo da sua chamada" required>
                  <label for="subject" id="created_called">Descrição:</label>
                </div>

                <input name="id_user_fk" type="hidden" value="{{auth::user()->id}}">

                <div class="input-field col s12 l12">      
                  <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Criar
                    <i class="material-icons right">save</i>
                  </button> 
        
                  <div class="input-field col s12 l12">
                    <a href="{{ route('students.start') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                  </div>
                </div>
              </div>
            </form>
          </div>    
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card z-depth-5">
      <div class="card-content">
        <div class="col s12 l12">
          <h3 class="center" id="titleColor" >Meu chamados</h3>
        </div>

        <table class="highlight striped centered" id="form_table_group_muscle">
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Descrição</th>
              <th>Ação</th>
            </tr>
          </thead>
          
          <tbody id="table-body">
            @foreach($calleds as $called)
              <tr>
                <td id="td-text">{{ $called->title }}</td>
                <td id="td-text">{{ $called->subject }}</td>
                <td>    
                  <form action="{{ route('admin.called.destroy', $called->id_called) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $called->id_called }}">
                    <button class="btn-floating tooltipped green darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Resolvido"><i class="material-icons">check_circle</i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação</h4>
      <p>Deseja realmente classificar o chamado como resolvido ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Sim</a>
    </div>
  </div>

@endsection

@section('script')
  <script>
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
            instance.close(); // Fechar o modal após a exclusão ser confirmada e o formulário ser enviado.
          });
        });
      });
    });
  </script>
@endsection