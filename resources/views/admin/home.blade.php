@extends('layouts.admin')

@section('title', 'Painel de Controle')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l10">
      <h3 id="titleColor">Painel Administrativo</h3>
    </div>
    
    <div class="col l2" id="button-report">
      <h2>
        <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="#report-modal"><i class="material-icons left" >bug_report</i>Reportar</a>
      </h2>
    </div>
  </div>
  
  <!-- Inicio de conteudo -->

  <!--Div para o bloco de notas -->
  <div class="row">
    <div class="col s12">
      <div class="card-panel">
        <h4 id="titleColor"> Bloco de anotações</h4>
  
        <form id="todo-form">
          <div class="input-field">
            <input type="text" id="todo-input" autocomplete="off" placeholder="Digite aqui a sua anotação">
          </div>
          <button class="btn waves-effect waves-light blue accent-2" type="submit">Adicionar</button>
        </form>
  
        <ul id="todo-list" class="collection"></ul>
      </div>
    </div>
  </div>

  <!-- Titulo -->
  <div class="row">
    <div class="col s12">
        <h5 id="titleColor" class="center">Atalhos e Informações</h5>
    </div>
  </div>
  
  <!--Divs para estatísticas aluno, fichas, chamados etc... -->
  <div class="row">
    <div class="col s12 m6 l3 ">
      <a href="{{ route('admin.users') }}" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">supervisor_account</i>
          <h5>Alunos</h5>
          <h3 class="count">{{count($users)}}</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 35%;"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="col s12 m6 l3">
      <a href="{{ route('admin.called') }}" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">forum</i>
          <h5>Chamados</h5>
          <h3 class="count">350</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 54%;"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="col s12 m6 l3">
      <a href="#" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">format_list_bulleted</i>
          <h5>Fichas</h5>
          <h3 class="count">{{ count($fichas) }}</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 78%;"></div>
          </div>
        </div>
      </a>
    </div>
      
    <div class="col s12 m6 l3">
      <a href="#" class="black-text">
        <div class="card-panel center ">
            <i class="material-icons medium" id="blueColor">analytics</i>
            <h5>Avaliações</h5>
            <h3 class="count">{{ count($assessment) }}</h3>
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 61%;"></div>
            </div>
        </div>
        </a>
    </div>
  </div>
      
  <!--Div para chamados -->
  <div class="row">
    <div class="col s12">      
      <ul class="collection">   
        <li class="collection-item avatar">
          <h4 id="titleColor">Chamados</h4>
          <p>Veja abaixo alguns de seus chamados</p>
        </li>
        @foreach ($calleds as $called)
          <li class="collection-item avatar">
            <img src="/img/profile_photo_path/{{$called->user_photo }}" alt="" class="circle">
            <span class="title">{{ $called->user_name }}</span>
            <p>{{ $called->title }}</p>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card">
      <div class="card-content">
        <div class="col s12 l12">
          <h3 class="center" id="titleColor" >Alguns exercícios finalizados</h3>
        </div>
  
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
                <td>{{ $statistic->name }}</td>
                <td>{{ $statistic->name_training }}</td>
                <td>{{ \Carbon\Carbon::parse($statistic->created_at)->format('d/m/Y H:i:s') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row">
    <canvas id="graficoUsuariosPorMes" width="400" height="200"></canvas>
  </div>
  <!-- Fim de conteudo -->
@endsection

@section('script')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      fetch('/admin/users-por-mes')
          .then(response => response.json())
          .then(data => {
              const meses = [];
              const usuariosCriados = [];

              data.forEach(item => {
                  meses.push(`Mês ${item.month}`);
                  usuariosCriados.push(item.total_users);
              });

              var ctx = document.getElementById('graficoUsuariosPorMes').getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: meses,
                      datasets: [{
                          label: 'Usuários Criados por Mês',
                          data: usuariosCriados,
                          backgroundColor: 'rgba(75, 192, 192, 0.5)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
              });
          });
  });
</script>
@endsection