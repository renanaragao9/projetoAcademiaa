@extends('layouts.admin')

@section('title', 'Painel de Controle')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l12">
      <h3 id="homeTitle">Painel Administrativo</h3>
    </div>
  </div>
  
  <!-- Inicio de conteudo -->

  <!--Div para o bloco de notas -->
  <div class="row">
    <div class="col s12">
      <div class="card-panel">
        <h4 id="homeTitle"> Bloco de Anotações</h4>
  
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
        <h3 id="homeTitle">Atalhos e Informações</h3>
    </div>
  </div>
  
  <!-- Grafico para Administrador -->
  @if(Auth::user()->profile === 2) 
    <div class="row">
      <div class="col s12 m6 l3 ">
        <a href="#!" class="black-text">
          <div class="card-panel center" id="card-expense-home">
           
            <i class="material-icons medium" id="blueColor">paid</i>
            <i class="material-icons medium" id="blueColor_assistent_enter">arrow_upward</i>
            
            <h5>Entrada Mensalidades</h5>
            <span>Mensal</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseCurrent['entryPayment'], 2, ',', '.') }}</h3>
            
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 100%;"></div>
            </div>

            <span>Geral</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseAll['totalPayment'], 2, ',', '.') }}</h3>
          </div>
        </a>
      </div>

      <div class="col s12 m6 l3 ">
        <a href="#!" class="black-text">
          <div class="card-panel center" id="card-expense-home">
            
            <i class="material-icons medium" id="blueColor">paid</i>
            <i class="material-icons medium" id="blueColor_assistent_enter">arrow_upward</i>
            
            <h5>Entrada Outros</h5>
            <span>Mensal</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseCurrent['entryCurrentMonth'], 2, ',', '.') }}</h3>
            
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 100%;"></div>
            </div>

            <span>Geral</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseAll['inputTotal'], 2, ',', '.') }}</h3>
          </div>
        </a>
      </div>

      <div class="col s12 m6 l3">
        <a href="#!" class="black-text">
          <div class="card-panel center" id="card-expense-home">
           
            <i class="material-icons medium" id="blueColor">paid</i>
            <i class="material-icons medium" id="blueColor_assistent_exit">south</i>
           
            <h5>Saídas</h5>
            <span>Mensal</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseCurrent['exitMonthCurrent'], 2, ',', '.') }}</h3>
            
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 100%;"></div>
            </div>

            <span>Geral</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseAll['exitTotal'], 2, ',', '.') }}</h3>
          </div>
        </a>
      </div>

      <div class="col s12 m6 l3">
        <a href="#!" class="black-text">
          <div class="card-panel center " id="card-expense-home">
           
            <i class="material-icons medium" id="blueColor">paid</i>
            <i class="material-icons medium" id="blueColor_assistent_all">swap_vert</i>
           
            <h5>Receita</h5>
            <span>Mensal</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseCurrent['totalCurrentMonth'], 2, ',', '.') }}</h3>
           
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 100%;"></div>
            </div>

            <span>Geral</span>
            <h3 id="count_expense_month">R$ {{ number_format( $expenseAll['totalGeral'], 2, ',', '.') }}</h3>
          </div>
        </a>
      </div>
    </div>
  @endif
  
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

    <div class="col s12 m6 l3 ">
      <a href="{{ route('admin.payments.index') }}" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">payments</i>
          <h5>Mensalidades</h5>
          <h3 class="count">{{count($payments)}}</h3>
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
          <h3 class="count">{{ count($called) }}</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 54%;"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="col s12 m6 l3">
      <a href="{{ route('admin.table.media') }}" class="black-text">
        <div class="card-panel center ">
            <i class="material-icons medium" id="blueColor">perm_media</i>
            <h5>Mídias</h5>
            <h3 class="count">{{ count($media) }}</h3>
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
          <h4 id="homeTitle">Chamados</h4>
          <p>Veja abaixo alguns de seus chamados</p>
        </li>

        @foreach ($calleds as $called)
          <li class="collection-item avatar">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/profile_photo_path/') . $called->user_photo)) }}" alt="Imagem de Perfil" class="circle" id="called_photo">
            <span class="title">{{ $called->user_name }}</span>
            <p>{{ $called->title }}</p>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col s12">      
      <ul class="collection">   
        <li class="collection-item avatar">
          <h4 id="homeTitle">Aniversariantes do Dia</h4>
        </li>

        @foreach ($nivers as $niver)
          @if($niver)
            <li class="collection-item avatar">
              <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/profile_photo_path/') . $niver->profile_photo_path)) }}" alt="Imagem de Perfil" class="circle" id="called_photo">
              <span class="title">{{ $niver->name }}</span>
              <p>{{ Carbon\Carbon::createFromFormat('Y-m-d', $niver->date)->format('d/m/Y') }}
            </li>
          @else
            <li class="collection-item avatar">
              <p>Não há Aniversariantes hoje!</p>
            </li>
          @endif
        @endforeach

        <li class="collection-item avatar">
          <h4 id="homeTitle">Aniversariantes do Mês</h4>
        </li>

        @foreach ($niverMonths as $niver)
          @if($niver)
            <li class="collection-item avatar">
              <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/profile_photo_path/') . $niver->profile_photo_path)) }}" alt="Imagem de Perfil" class="circle" id="called_photo">
              <span class="title">{{ $niver->name }}</span>
              <p>{{ Carbon\Carbon::createFromFormat('Y-m-d', $niver->date)->format('d/m/Y') }}
            </li>
          @else
            <li class="collection-item avatar">
              <p>Não há Aniversariantes pro mês!</p>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card">
      <div class="card-content">
        <div class="col s12 l12">
          <h4 id="homeTitle" >Alguns exercícios finalizados</h4>
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
    fetch('../admin/users-por-mes')
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