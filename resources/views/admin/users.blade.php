@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

  <div class="row">
    <div class="card z-depth-5">
      <div class="card-content">
        <div class="col s12 l12">
          <h3 class="center" id="homeTitle">Listagem de Alunos</h3>
          <a href="{{ route('admin.user.create') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons right">person_add</i>Cadastrar</a>
          <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons left">arrow_back</i>Voltar</a>
        </div>
        
        <div id="total-records" class="total-records"></div>
        <input type="text" id="search" placeholder="Pesquisar...">
        <div class="table-scroll">
          <table class="highlight striped centered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="hide-on-small-only">Situação</th>
                <th class="hide-on-small-only">Email</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="table-body">
              @foreach ($users as $user)
                <tr>
                  <td id="td-text"> <span id="td-text-span">{{ $user->id }} </span></td>
                  
                  <td id="td-text"> <span id="td-text-span">{{ $user->name }}</span> </td>
                  
                  <td id="td-text" class="hide-on-small-only">
                    @if ($user->due_date)
                      @php
                        $dueDate = \Carbon\Carbon::parse($user->due_date);
                        $today = \Carbon\Carbon::now();
            
                        if ($dueDate->isPast()) {
                          $statusClass = 'red lighten-2'; // Vermelho para atrasado
                          $statusText = 'Atrasado';
                        
                        } elseif ($dueDate->isToday()) {
                          $statusClass = 'yellow lighten-2'; // Amarelo para vence hoje
                          $statusText = 'Vence Hoje';
                        
                        } elseif ($dueDate->isFuture()) {
                          $statusClass = 'green lighten-2'; // Verde para em dia
                          $statusText = 'Em dias';
                        }
                      
                      @endphp
                      
                      <p class="badge {{ $statusClass }} hide-on-small-only" id="status-table-user"> <span id="td-text-span"> {{ $statusText }}</span> </p>
                    @else
                      <p class="badge grey hide-on-small-only" id="status-table-user"> <span id="td-text-span">Sem Pgto </span></p>
                    @endif
                  </td>
                
                  <td class="hide-on-small-only" id="td-text"><span id="td-text-span">{{ $user->email }} </span></td>
                  
                  <td id="td-form-desktop">
                    <div class="action-buttons">
                      <!-- Botão de ação Desktop-->
                      <a href="{{ route('admin.users.view', $user->id) }}" class="btn-floating tooltipped cyan darken-4 btn-large waves-effect waves-light red" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                      
                      <a href="{{ route('admin.payments.register', $user->id) }}" class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-buttons-desktop" data-position="bottom" data-tooltip="Mensalidade"><i class="material-icons">payments</i></a>
                      
                      <a href="{{ route('admin.register.ficha', $user->id) }}" class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-buttons-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                      
                      <a href="{{ route('admin.assessment.create', $user->id) }}" class="btn-floating tooltipped cyan accent-4 btn-large waves-effect waves-light red" id="action-buttons-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                      
                      <a href="{{ route('admin.user.resetPassword', $user->id) }}" class="btn-floating tooltipped green lighten-2 btn-large waves-effect waves-light red"  id="action-buttons-desktop" data-position="bottom" data-tooltip="Resetar senha" ><i class="material-icons">lock_reset</i></a>
                      
                      <a href="{{ route('admin.user.edit', $user->id) }}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-buttons-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      
                      <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Chamada para o botao de pesquisar... -->
        <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
        <div id="total-records" class="total-records"></div>
      </div>
    </div>
  </div>
  
  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Exclusão</h4>
      <p>Deseja realmente excluir o aluno ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Excluir</a>
    </div>
  </div>

   <!-- Modal de alerta Check-->
  <div id="modalConfirmation" class="modal">
    <div class="modal-content">
      <h4>Confirmação</h4>
      <p>Você quer mudar o status do checkbox?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" id="confirmBtn" class="modal-close waves-effect waves-green btn">Sim</a>
      <a href="#!" id="cancelBtn" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
    </div>
  </div>
    
<!-- Fim de conteudo -->
@endsection

@section('script')
  <script>

    // Função para filtrar os registros da tabela
    function filterTable() {
        
      let input = document.getElementById('search');
      let filter = input.value.toLowerCase();
      let rows = document.getElementById('table-body').getElementsByTagName('tr');
      let noResultsMessage = document.getElementById('no-results');
      let totalRecords = document.getElementById('total-records');
      let resultsFound = false;
      let count = 0;

      for (let i = 0; i < rows.length; i++) {
        
        let nome = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
        let acao = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
        let situacao = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();
        let email = rows[i].getElementsByTagName('td')[3].innerText.toLowerCase();

        if (nome.indexOf(filter) > -1 || acao.indexOf(filter) > -1 || situacao.indexOf(filter) > -1 || email.indexOf(filter) > -1) {
          rows[i].style.display = '';
          resultsFound = true;
          count++;
        
        } else {
          rows[i].style.display = 'none';
        }
      }

      if (resultsFound) {
        noResultsMessage.style.display = 'none';
      } else {
        noResultsMessage.style.display = 'block';
      }

      totalRecords.innerText = "Total de registros encontrados: " + count;
    }

    document.getElementById('search').addEventListener('input', filterTable); 
  
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

    $(document).ready(function(){
      $('.modal').modal();

      $('#myCheckbox').on('click', function(){
        $('#modalConfirmation').modal('open');
      });

      $('#confirmBtn').on('click', function(){
      });

      $('#cancelBtn').on('click', function(){
        $('#myCheckbox').prop('checked', false);
      });
    });
    
  </script>
@endsection