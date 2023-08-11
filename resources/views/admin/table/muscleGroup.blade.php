@extends('layouts.admin')

@section('title', 'Tabela de Grupo Muscular')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="card z-depth-5">
    <div class="card-content">
      <div class="col s12 l10">
        <h3 class="center" id="titleColor" >Tabela dos Grupos Musculares</h3>
      </div>
      
      <input type="text" id="search" placeholder="Pesquisar...">
      <div id="total-records" class="total-records"></div>
      <table class="highlight striped centered" id="form_table_group_muscle">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Ação</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @foreach($muscleGroups as $musclegroup)
            <tr>
              <td id="td-text">{{ $musclegroup->name_gmuscle }}</td>
              <td>    
                <!-- Botão de ações-->
                <a href="{{ route('admin.edit.groupmuscle', $musclegroup->id_gmuscle)}}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="bottom-table-action" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                
                <form action="{{ route('admin.groupmuscle.destroy', $musclegroup->id_gmuscle) }}" method="POST" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $musclegroup->id_gmuscle }}">
                  <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Chamada para o botao de pesquisar... -->
      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Exclusão</h4>
      <p>Deseja realmente excluir esse registro?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Excluir</a>
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

          if (nome.indexOf(filter) > -1 || acao.indexOf(filter) > -1) {
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

      // Evento de input para acionar a filtragem ao digitar na caixa de pesquisa
      document.getElementById('search').addEventListener('input', filterTable); 


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
