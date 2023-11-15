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

  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoUsuariosPorMes" width="400" height="200"></canvas>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoFichasPorMes" width="400" height="200"></canvas>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoAssessmentPorMes" width="400" height="200"></canvas>
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
  <script src="/js/paginas/statistics.js"></script>
@endsection