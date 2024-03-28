@extends('layouts.admin')

@section('title', 'Relatorio de Despesas')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="form_report_expense" action="{{ route('admin.expense.report-pdf') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">                  
              <div class="input-field col s12 l12">
                <h3 id="homeTitle" class="center">Relatório <br> Despesas</h3>
              </div>

              <div class="input-field col s12" id="select-report">
                <select name="period" class="browser-default" id="period" required>
                  <option disabled>Selecione:</option>
                  @foreach ($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                  @endforeach
                </select>
                <label id="labelSpacing"><h11>*</h11>Período</label>
              </div>
              
              <!-- Se Mes -->
              <div class="input-field col s12 l6" id="monthly">
                <i class="material-icons prefix" id="iconeMobile">calendar_month</i>
                <input name="date_monthly" type="date" class="datepicker">
                <span id="alert-img">*Somente o mês é considerado</span>
              </div>
              
              <!-- Se Intervalo -->
              <div class="input-field col s12 l6" id="interval" style="display:none;">
                <i class="material-icons prefix" id="iconeMobile">calendar_month</i>
                <input name="date_interval1" type="date" class="datepicker">
              </div>
              
              <div class="input-field col s12 l6" id="interval2" style="display:none;">
                <i class="material-icons prefix" id="iconeMobile">calendar_month</i>
                <input name="date_interval2" type="date" class="datepicker">
              </div>

              <div class="input-field col s12 l6" id="select-report">
                <select name="form_expense" class="browser-default" id="for_expense" required>
                  <option value="all" selected>Selecione</option>
                  @foreach ($form_payments as $form_payment)
                    <option value="{{ $form_payment }}">{{ $form_payment }}</option>
                  @endforeach
                </select>
                <label id="labelSpacing"><h11>*</h11>Forma de Pesquisa</label>
              </div>

              <div class="input-field col s12 l6" id="select-report">
                <select name="payments" class="browser-default" id="payments" required>
                  <option value="all" >Selecione</option>
                  <option value="Sim" >Sim</option>
                  <option value="Nao" >Não</option> 
                </select>
                <label id="labelSpacing"><h11>*</h11>Incluir Mensalidades</label>
              </div>
              
              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Criar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">arrow_back</i>Voltar</a>
              </div>
            </div>
          </form>
        </div>    
      </div>
    </div>
  </div>  
@endsection

@section('script')
  <script>
   
    const selected = document.getElementById("period");

    selected.addEventListener('change', function() {
      const monthly = document.getElementById("monthly");
      const interval = document.getElementById("interval");
      const interval2 = document.getElementById("interval2");

      if (selected.value === 'Mês') {
        monthly.style.display = 'block';
        interval.style.display = 'none';
        interval2.style.display = 'none';
      } else if (selected.value === 'Intervalo') {
        monthly.style.display = 'none';
        interval.style.display = 'block';
        interval2.style.display = 'block';
      }
    });

    let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
    // Define a classe com base na largura da tela
    if (larguraTela > 700) {
      $("#period").removeClass("browser-default");
      $("#payments").removeClass("browser-default");
      $("#for_expense").removeClass("browser-default");
    }
   
  </script>
@endsection