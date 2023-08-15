@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="card z-depth-5">
      <div class="card-content">
        <div class="col s12 l12">
          <h3 class="center" id="titleColor" >Lista de alunos</h3>
        </div>
        <div id="total-records" class="total-records"></div>
        <input type="text" id="search" placeholder="Pesquisar...">
        <table class="highlight striped centered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($users as $user)
              <tr>
                <td id="td-text">{{ $user->name }}</td>
                <td id="td-text"><a href="#">{{ $user->email }}</a></td>
                <td>                              
                  <!-- Botão de ação Desktop-->
                  <a href="{{ route('admin.register.ficha') }}" class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a href="{{ route('admin.user.edit', $user->id) }}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">edit</i></a>
                  
                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                  </form>
                </td>
              </tr>
            @endforeach

            <!-- Adicione mais registros aqui -->
          </tbody>
        </table>

        <!-- Chamada para o botao de pesquisar... -->
        <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
        <div id="total-records" class="total-records"></div>
      </div>
    </div>
  </div>
  <!-- Fim de conteudo -->
  
  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Exclusão</h4>
      <p>Deseja realmente excluir o usuário: {{$user->name}} ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Excluir</a>
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
            instance.close(); // Fechar o modal após a exclusão ser confirmada e o formulário ser enviado.
          });
        });
      });
    });
    
    {{-- 
      o modal é estilizado usando as classes CSS fornecidas pelo Materialize CSS. Usamos a função M.Modal.init() para inicializar o modal e a função instance.open() para abrir o modal quando o formulário for submetido.
      o evento submit é usado para interceptar o envio do formulário, e o modal é aberto nesse momento. Quando o botão "Enviar" dentro do modal é clicado, o formulário é enviado utilizando form.submit(). 
      --}}
  </script>
@endsection