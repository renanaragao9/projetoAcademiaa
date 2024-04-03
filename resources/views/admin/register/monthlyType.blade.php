@extends('layouts.admin')

@section('title', 'Cadastrar Tipo Mensalidade')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="form_group_muscle" action="{{ route('admin.monthlyType.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">                  
              <div class="input-field col s12 l12">
                <h3 id="homeTitle" class="center">Cadastrar <br> Tipo Mensalidade</h3>
              </div>

              <div class="input-field col s12 l12">
                <input name="name_monthly" type="text" class="validate" id="icon-nome" required>
                <label for="icon-nome"><h11>*</h11> Nome:</label>
              </div>

              <div class="input-field col s12 l6">
                <input name="value" type="text" class="validate" id="icon_value" required>
                <label for="icon_value"><h11>*</h11> Valor:</label>
              </div>

              <div class="input-field col s12 l6" id="select-month">
                <select name="months" id="id_months" class="browser-default" required>
                  <option value="" disabled selected>Selecione</option>
                  <option value="1" >Um Mês</option>
                  <option value="2" >Dois Meses</option>
                  <option value="3" >Tres Meses</option>
                  <option value="4" >Quatro Meses</option>
                  <option value="5" >Cinco Meses</option>
                  <option value="6" >Seis Meses</option>
                  <option value="7" >Sete Meses</option>
                  <option value="8" >Oito Meses</option>
                  <option value="9" >Nove Meses</option>
                  <option value="10" >Dez Meses</option>
                  <option value="11" >Onze Meses</option>
                  <option value="12" >Doze Meses</option>
                </select>
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Quantidade de Meses</label>
              </div>

              <div class="input-field col s12 l12">
                <input name="observation" type="text" class="validate" id="icon_observation">
                <label for="icon_observation">Observação:</label>
              </div>

              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.table.monthlyType') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Registros</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.table.monthlyType') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                </div>
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
      <p>Deseja realmente cadastrar o Tipo da Mensalidade ?</p>
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
    document.addEventListener('DOMContentLoaded', function() {
      
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let form = document.querySelector('#form_group_muscle');

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
    });

    document.getElementById("icon_value").addEventListener("input", function() {
      let inputValue = this.value;
      
      inputValue = inputValue.replace(/[^0-9.]/g, "");
      
      inputValue = inputValue.replace(/\.{2,}/g, ".");
      
      inputValue = inputValue.replace(/\.(\D)/g, "$1");
      
      this.value = inputValue;
    });

    let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
    // Define a classe com base na largura da tela
    if (larguraTela > 700) {
      $("#id_months").removeClass("browser-default");
    }
  </script>
@endsection