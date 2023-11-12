@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l10">
      <h3 id="titleColor">Painel de Estatísticas </h3>
    </div>
  </div>

  <!-- Inicio de conteudo -->

  <!--Div para o ChartJs -->
  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="chart"></canvas>
      </div>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  <div class="card">
    <div class="card-content">
      <div class="col s12 l12">
        <h3 class="center" id="titleColor" >Exercícios Finalizados</h3>
      </div>
      
      <input type="text" id="search" placeholder="Pesquisar...">
      <div id="total-records" class="total-records"></div>
      <table class="highlight striped centered" id="form_table_group_muscle">
        <thead>
          <tr>
            <th>Aluno</th>
            <th>Ficha</th>
            <th>Dia</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @foreach($statistics as $statistic)
            <tr>
              <td id="td-text">{{ $statistic->name }}</td>
              <td id="td-text">{{ $statistic->name_training }}</td>
              <td id="td-text">{{ \Carbon\Carbon::parse($statistic->created_at)->format('d/m/Y H:i:s') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Chamada para o botao de pesquisar... -->
      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>
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
  </script>
@endsection