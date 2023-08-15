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
                    <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
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
          let email = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
          let aluno = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();

          if (nome.indexOf(filter) > -1 || email.indexOf(filter) > -1 || aluno.indexOf(filter) > -1) {
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
  </script>
@endsection