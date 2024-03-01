@extends('layouts.admin')

@section('title', 'Estatisticas')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l10">
      <h3 id="homeTitle">Painel de Estatísticas </h3>
      <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="{{ route('admin.home') }}"><i class="material-icons left" >arrow_back</i>Voltar</a>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  
  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoUsuariosPorMes" width="400" height="200"></canvas>
      </div>

      <div class="card">
        <div class="row">
          <div class="col s12 l12">
            <table class="highlight">
                <h4>Informações do Gráfico Alunos</h4>                   
                <tbody>                         
                    <tr>
                        <td id="text-profile" class="s12 l1">Total de Alunos: {{$user_dados[0]['total_alunos']}}</td>
                        <td id="text-profile" class="s12 l1">Total de alunos do sexo Masculino: {{$user_dados[1]['total']}}</td>
                        <td id="text-profile" class="s12 l1">Total de alunos do sexo Feminino: {{$user_dados[2]['total']}}</td>
                        <td id="text-profile" class="s12 l1">Total de alunos do sexo Outros: {{$user_dados[3]['total']}}</td>
                    </tr>
                   
                    <tr>
                      <td id="text-profile" class="s12 l2">Alunos entre 10-17 anos: {{$user_dados[4]['total']}}</td>
                      <td id="text-profile" class="s12 l2">Alunos entre 18-28 anos: {{$user_dados[5]['total']}}</td>
                      <td id="text-profile" class="s12 l2">Alunos entre 29-40 anos: {{$user_dados[6]['total']}}</td>
                      <td id="text-profile" class="s12 l2">Alunos com 41+ anos: {{$user_dados[7]['total']}}</td>
                    </tr>
                </tbody>                 
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoMensalidadePorMes" width="400" height="200"></canvas>
      </div>

      <div class="card">
        <div class="row">
          <div class="col s12 l12">
            <table class="highlight">
                <h4>Informações do Gráfico Mensalidades</h4>                   
                <tbody>                         
                    <tr>
                        <td id="text-profile" class="s12 l1">Total de Receita: <br> R$ {{ number_format(DB::table('payments')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }}</td>
                        <td id="text-profile" class="s12 l1">Pgto em Dinheiro: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Dinheiro')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Dinheiro')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                        <td id="text-profile" class="s12 l1">Pgto em Pix: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Pix')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Pix')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                        <td id="text-profile" class="s12 l1">Pgto no Débido: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Débito')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Débito')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                    </tr>
                   
                    <tr>
                      <td id="text-profile" class="s12 l1">Pgto no Crédito: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Crédito')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Crédito')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                      <td id="text-profile" class="s12 l1">Pgto no Boleto: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Boleto')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Boleto')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                      <td id="text-profile" class="s12 l1">Pgto em Vale: R$ {{ number_format(DB::table('payments')->where('form_payment', 'Vale')->sum(DB::raw('CAST(value_payment AS DECIMAL(10,2))')), 2, ',', '.') }} <br> Total: {{ DB::table('payments')->where('form_payment', 'Vale')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))')) }} </td>
                      <td id="text-profile" class="s12 l1">Total: {{ DB::table('payments')->count(DB::raw('CAST(value_payment AS DECIMAL(10,2))'))}}</td>
                    </tr>
                </tbody>                 
            </table>
          </div>
        </div>
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

  <div class="row">
    <div class="col s12">
      <div class="card ">
        <canvas id="graficoCalledPorMes" width="400" height="400"></canvas>
      </div>
    </div>
  </div>

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
              <td id="statistic-table">{{ $statistic->name }}</td>
              <td id="statistic-table">{{ $statistic->name_training }}</td>
              <td id="statistic-table">{{ \Carbon\Carbon::parse($statistic->created_at)->format('d/m/Y H:i:s') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>


  <div class="card">
    <div class="card-content">
      <div class="col s12 l12">
        <h3 class="center" id="titleColor" >Ranking de Exercícios Finalizados</h3>
      </div>

      <table class="highlight striped centered" id="form_table_group_muscle">
        <thead>
          <tr>
            <th>Posição</th>
            <th>Aluno</th>
            <th>Total</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @php $position = 1; @endphp
          @foreach($topStudentsTotals as $studentName => $totalFichas)
            <tr>
              <td id="statistic-table">{{ $position}}º</td>
              <td id="statistic-table">{{ $studentName }}</td>
              <td id="statistic-table">{{ $totalFichas }}</td>
            </tr>
            @php $position++; @endphp
          @endforeach
        </tbody>
      </table>
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


    document.addEventListener("DOMContentLoaded", function() {
      fetch('/estatisticas/users-por-mes')
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

    fetch('/estatisticas/payment-por-mes')
        .then(response => response.json())
        .then(data => {
        const meses = [];
        const Mensalidades_Pagas = [];

        data.forEach(item => {
            meses.push(`Mês ${item.month}`);
            Mensalidades_Pagas.push(item.total_payment);
        });

        var ctx = document.getElementById('graficoMensalidadePorMes').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Mensalidades Criados por Mês',
                    data: Mensalidades_Pagas,
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

    fetch('/estatisticas/fichas-por-mes')
            .then(response => response.json())
            .then(data => {
                const meses = [];
                const fichasCriadas = [];

                data.forEach(item => {
                    meses.push(`Mês ${item.month}`);
                    fichasCriadas.push(item.total_fichas);
                });

                var ctx = document.getElementById('graficoFichasPorMes').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: meses,
                        datasets: [{
                            label: 'Fichas Criadas por Mês',
                            data: fichasCriadas,
                            backgroundColor: 'rgba(255, 206, 86, 0.5)', 
                            borderColor: 'rgba(255, 206, 86, 1)',
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

            fetch('/estatisticas/assessment-por-mes')
            .then(response => response.json())
            .then(data => {
                const meses = [];
                const avaliacoesCriadas = [];

                data.forEach(item => {
                    meses.push(`Mês ${item.month}`);
                    avaliacoesCriadas.push(item.total_assessment);
                });

                var ctx = document.getElementById('graficoAssessmentPorMes').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: meses,
                        datasets: [{
                            label: 'Avaliações Criadas por Mês',
                            data: avaliacoesCriadas,
                            backgroundColor: 'rgba(139, 69, 19, 0.5)', // Cor marrom
                            borderColor: 'rgba(139, 69, 19, 1)', // Cor marrom
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
            
            fetch('/estatisticas/called-por-mes')
            .then(response => response.json())
            .then(data => {
                const meses = [];
                const chamados = [];

                data.forEach(item => {
                    meses.push(`Mês ${item.month}`);
                    chamados.push(item.total_called);
                });

                var ctx = document.getElementById('graficoCalledPorMes').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: meses,
                        datasets: [{
                            label: 'Chamados Criados por Mês',
                            data: chamados,
                            backgroundColor: 'rgba(0, 0, 0, 0.5)', // Cor marrom
                            borderColor: 'rgba(139, 69, 19, 1)', // Cor marrom
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