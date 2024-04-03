@extends('layouts.admin')

@section('title', 'Cadastrar Mensalidade')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="card white">
      <div class="card-content">           
        <div class="row">
          <form class="col s12" id="payments" action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">                  
              <div class="input-field col s12 l12">
                <h3 id="homeTitle" class="center">Cadastrar <br>Mensalidade</h3>
                <h5 id="homeTitle" class="center">Aluno(a) {{ $user->name }}</h5>
              </div>

              <div class="input-field col s12 l6" id="select-mensalidade">
                <select name="monthly_type_id" id="id_form_payment" class="browser-default" required>
                  <option value="" disabled selected>Selecione</option>

                  @foreach ($type_payments as $type_payment)
                    <option value="{{ $type_payment->id_monthly_type }}" data-value="{{ $type_payment->value }}"> {{ $type_payment->name_monthly }}</option>
                  @endforeach
                </select>
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Tipo da Mensalidade</label>
              </div>

              <div class="input-field col s12 l6">
                <input name="value_payment" type="text" class="validate" id="icon_value" placeholder="R$ 00.00" readonly>
                <label for="icon_value"><h11>*</h11> Valor a Pagar</label>
              </div>

              <div class="input-field col s12 l6" id="select-mensalidade">
                <select name="form_payment" id="form_payment" class="browser-default" required>
                  <option value="" disabled selected>Selecione</option>

                  @foreach ($form_payments as $form_payment)
                    <option value="{{ $form_payment }}"> {{ $form_payment }}</option>
                  @endforeach
                </select>
                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Forma de Pagamento</label>
              </div>

              <div class="row">
                <div class="input-field col s12 l6">
                  <input name="date_payment" type="date" class="validate" id="icon_date" required>
                  <label for="icon_date">Data do Pagamento:</label>
                </div>
              </div>

              <div class="input-field col s12 l12">
                <input name="observation" type="text" class="validate" id="icon_obs">
                <label for="icon_obs">Observação</label>
              </div>

              <input type="hidden" name="user_id" value="{{ $user->id }}">
              <input type="hidden" name="user_id_creator" value={{ Auth::user()->id }}>

              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.payments.indexUser', $user->id) }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Pagamentos do Aluno</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
      <p>Deseja realmente cadastrar a Mensalidade ?</p>
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
      let form = document.querySelector('#payments');

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

        let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
        // Define a classe com base na largura da tela
        if (larguraTela > 700) {
            $("#id_form_payment").removeClass("browser-default");
            $("#form_payment").removeClass("browser-default");
        }

        $(document).ready(function(){
  
          // Obtenha a data atual
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
          var yyyy = today.getFullYear();
          
          // Formate a data para o formato do campo de entrada de data
          var formattedDate = yyyy + '-' + mm + '-' + dd;
          
          // Defina a data atual como o valor padrão para o campo de entrada de data
          $('#icon_date').val(formattedDate);

          $('#id_form_payment').change(function() {
              var selectedOption = $(this).find(':selected');
              var id = selectedOption.val();
              var value = selectedOption.data('value');
              $('#icon_value').val(value);
          });
        });
  </script>
@endsection