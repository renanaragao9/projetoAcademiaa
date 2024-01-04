@extends('layouts.admin')

@section('title', 'Cadastro de Aluno')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form method="POST" action="{{ route('admin.user.store') }}" class="col s12" id="form_user" >
              @csrf
              <div class="input-field col s12 l12">
                <h3 id="homeTitle" class="center">cadastrar aluno(a)</h3>
              </div>

              <div class="input-field col s12 l6">
                <i class="material-icons prefix">account_circle</i>
                <input name="name" id="icon-nome" type="text" class="validate" required>
                <label for="icon-nome" id="labelSpacing">Nome</label>
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">wc</i>
                <select name="sexo">
                  <option value="" disabled selected>Opção</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Outros">Outros</option>
                </select>
                <label id="labelSpacing">Sexo</label>
              </div>                            
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">phone</i>
                <input name="phone" id="icon_telephone" type="text" class="validate">
                <label for="icon_telephone" id="labelSpacing">Telefone</label>
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">calendar_month</i>                       
                <input name="date" type="date" class="datepicker">
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">mail</i>
                <input name="email" id="email" type="email" class="validate" required>
                <label for="email">E-mail</label>
                <span class="helper-text" data-error="Email Inválido" data-success="Email Valido"></span>
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">lock</i>
                <input name="password" id="password" type="password" class="validate" required>
                <label for="password">Senha</label>
              </div>

              <div class="input-field col s12">
                <i class="material-icons prefix">assignment_ind</i>
                <select name="profile">
                  <option selected value="0">Aluno(a)</option>
                  <option value="1">Professor(a)</option>
                  @if(Auth::user()->profile === 2)
                   <option value="2">Administrador(a)</option>
                  @endif
                </select>
                <label>Perfil</label>
              </div>    

              <div class="input-field col s12 l12">      
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5"><i class="material-icons right">table_rows</i>Alunos</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                </div>
              </div>
            </form>
          </div>    
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Cadastro</h4>
      <p>Deseja Cadastrar o Aluno ?</p>
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
      let form = document.querySelector('#form_user');

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
  </script>
@endsection