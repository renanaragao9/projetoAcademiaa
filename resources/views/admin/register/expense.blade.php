@extends('layouts.admin')

@section('title', 'Cadastro de Desepesa')

@section('content')
    
  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="form_media" action="{{ route('admin.expense.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="input-field col s12 l12" id="input-exercicio">
                <h3 id="homeTitle" class="center">Cadastrar <br> Despesa</h3>
              </div>

              <div class="input-field col s12 l6" id="select-desktop">
                <select name="tipo_expense" class="browser-default" id="select-type" required>
                  <option selected disabled>Selecione o tipo de despesa:</option>
                  <option value="1"> Entrada </option>
                  <option value="2"> Saída </option>     
                </select> 
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Tipo de Despesa</label>
              </div>

              <div class="input-field col s12 l6" id="input-title">
                <input name="data_expense" id="icon-data" type="date" class="validate">
                <label for="icon-data">Data:</label>
              </div>

              <div class="input-field col s12 l6" id="input-title">
                <input name="value_expense" id="icon-value" type="tel" class="validate" >
                <label for="icon-value"><h11>*</h11> Valor:</label>
              </div>
              
              <div class="input-field col s12 l6" id="input-description">
                <input name="description_expense" id="icon-descricao" type="text" class="validate">
                <label for="icon-descricao"><h11>*</h11> Descrição:</label>
              </div>

              <div class="input-field col s12 l12" id="input-tag">
                <input name="observation_expense" id="icon-observation" type="text" class="validate">
                <label for="icon-observation">Observação:</label>
              </div>
                
              <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
              
              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.table.expense') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
        <h4>Confirmação de Registro</h4>
        <p>Deseja realmente lançar essa despesa ?</p>
    </div>

    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Sim</a>
    </div>
  </div>

<!-- Fim de conteudo -->
@endsection

@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let form = document.querySelector('#form_media');

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        instance.open();
      });

      let cancelBtn = document.querySelector('.modal-footer .modal-close');

      cancelBtn.addEventListener('click', function() {
        instance.close();
      });

      let sendBtn = document.getElementById('sendBtn');

      sendBtn.addEventListener('click', function() {
        form.submit();
      });

      var valueInput = document.getElementById('icon-value')

      valueInput.addEventListener('input', function() {

        this.value = this.value.replace(/[^0-9.]/g, '');


        if (this.value.split('.').length > 2) {
          this.value = this.value.slice(0, -1);
        }
        
      });
    });

    selected = document.getElementById("select-type")
    
    selected.addEventListener('change', function() {
    
      if(selected.value == 1) {
        document.getElementById("input-link").style.display = 'none'
        document.getElementById("input-description").style.display = 'none'
        document.getElementById("input-tag").style.display = 'none'
      
      } else {
        document.getElementById("input-link").style.display = 'block'
        document.getElementById("input-description").style.display = 'block'
        document.getElementById("input-tag").style.display = 'block'
      }
    });

    let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if (larguraTela > 700) {
      $("#select-type").removeClass("browser-default");
    }

    var today = new Date();

    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    document.getElementById("icon-data").value = today;
  </script>
@endsection