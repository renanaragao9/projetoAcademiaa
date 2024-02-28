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
                <h3 id="homeTitle" class="center">Relatorio <br> Mensalidade</h3>
              </div>

              <div class="input-field col s12" id="select-report">
                <select name="period" id="period" required>
                  <option disabled>Selecione:</option>
                  @foreach ($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                  @endforeach
                </select>
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
   
  </script>
@endsection