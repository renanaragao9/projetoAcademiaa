@extends('layouts.admin')

@section('title', 'Relatorio Mensalidade')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="form_report_payment" action="{{ route('admin.payments.report-pdf') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">                  
              <div class="input-field col s12 l12">
                <h3 id="homeTitle" class="center">Relatório <br> Mensalidade</h3>
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
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Mês</label>
                <span id="alert-img">*Somente o mês é considerado</span>
              </div>
              
              <!-- Se Intervalo -->
              <div class="input-field col s12 l6" id="interval" style="display:none;">
                <i class="material-icons prefix" id="iconeMobile">calendar_month</i>
                <input name="date_interval1" type="date" class="datepicker">
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Mês Início</label>
              </div>
              
              <div class="input-field col s12 l6" id="interval2" style="display:none;">
                <i class="material-icons prefix" id="iconeMobile">calendar_month</i>
                <input name="date_interval2" type="date" class="datepicker">
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Mês Fim</label>
              </div>

              <div class="input-field col s12" id="select-report">
                <select name="form_payment" class="browser-default" id="for_payment" required>
                  <option value="all" selected>Todos</option>
                  @foreach ($form_payments as $form_payment)
                    <option value="{{ $form_payment }}">{{ $form_payment }}</option>
                  @endforeach
                </select>
                <label id="labelSpacing"><h11>*</h11>Forma de Pagamento</label>
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

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Cadastro</h4>
      <p>Deseja realmente cadastrar o Grupo Muscular ?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Cadastrar</a>
    </div>
  </div>
  <!-- Fim de conteudo -->

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
      $("#for_payment").removeClass("browser-default");
    }
   
  </script>
@endsection