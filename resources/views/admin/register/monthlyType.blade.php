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
                <label for="icon-nome">Nome:</label>
              </div>

              <div class="input-field col s12 l12">
                <input name="value" type="text" class="validate" id="icon_value" required>
                <label for="icon_value">Valor:</label>
              </div>

              <div class="input-field col s12 l12">
                <input name="observation" type="text" class="validate" id="icon_observation">
                <label for="icon_observation">Observação:</label>
              </div>

              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.table.monthlyType') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Tabela</a>
      
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
        // Remove todos os caracteres exceto números e pontos
        inputValue = inputValue.replace(/[^0-9.]/g, "");
        // Verifique se há mais de um ponto decimal consecutivo e remova-os
        inputValue = inputValue.replace(/\.{2,}/g, ".");
        // Verifique se há um ponto decimal seguido por um número e remova-os
        inputValue = inputValue.replace(/\.(\D)/g, "$1");
        // Atualize o valor do campo de entrada
        this.value = inputValue;
    });
  </script>
@endsection