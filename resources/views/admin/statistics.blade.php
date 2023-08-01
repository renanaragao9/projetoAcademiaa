@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

    <!--Divs para titulo e Reporte -->
    <div class="row">
        <div class="col s12 l10">
          <h3 id="titleColor">Painel de Gráficos</h3>
        </div>
        
        <div class="col l2" id="button-report">
          <h2>
            <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="#report-modal"><i class="material-icons left" >bug_report</i>Reportar</a>
          </h2>
        </div>
      </div>

      <!-- Inicio de conteudo -->

      <!--Div para o ChartJs -->
      <div class="row">
        <div class="col s12 z-depth-3">
          <div class="card ">
            <canvas id="chart"></canvas>
          </div>
        </div>
      </div>

      <!-- Fim de conteudo -->

@endsection