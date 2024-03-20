@extends('layouts.admin')

@section('title', 'Cadastro de Aluno')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content">           
          <div class="row">
            <form method="POST" action="{{ route('admin.user.update', $user->id) }}" class="col s12" id="form_exercise">
              @method('PUT')
              @csrf
              
              <div class="col s12 l12">
                  <!-- Título e subtítulo -->
                  <div class="input-field">
                      <h3 class="center" id="homeTitle">Editar Cadastro</h3>
                      <h4 class="center" id="homeTitle"> Aluno(a) {{ $user->name }} </h4>
                  </div>
              </div>
              
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">account_circle</i>
                <input name="name" id="icon-nome" type="text" class="validate" value="{{ $user->name }}">
                <label for="icon-nome">Nome</label>
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">wc</i>
                <select name="sexo">
                  <option value="" disabled selected>Opção</option>
                  <option value="Masculino" {{ $user->sexo == "Masculino" ? "selected='selected'" : "" }}>Masculino</option>
                  <option value="Feminino" {{ $user->sexo == "Feminino" ? "selected='selected'" : "" }}>Feminino</option>
                  <option value="Outros">Outros</option>
                </select>
                <label>Sexo</label>
              </div>                            
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">phone</i>
                <input name="phone" id="icon_telephone" type="tel" class="validate" value="{{ $user->phone }}">
                <label for="icon_telephone">Telefone</label>
              </div>
            
              <div class="input-field col s12 l6">
                <i class="material-icons prefix">calendar_month</i>                       
                <input name="input" type="text" class="datepicker" value="{{ $user->date }}" disabled>
              </div>
            
              <div class="input-field col s12 l12">
                <i class="material-icons prefix">mail</i>
                <input name="email" id="email" type="email" class="validate" value="{{ $user->email }}">
                <label for="email">E-mail</label>
                <span class="helper-text" data-error="Email Inválido" data-success="Email Valido"></span>
              </div>

              <div class="input-field col s12">
                <i class="material-icons prefix">assignment_ind</i>
                <select name="profile">
                  <option value="0" {{ $user->profile == 0 ? "selected='selected'" : "" }}>Aluno(a)</option>
                  <option value="1" {{ $user->profile == 1 ? "selected='selected'" : "" }}>Professor(a)</option>
                  @if(Auth::user()->profile === 2)
                   <option value="2" {{ $user->profile == 2 ? "selected='selected'" : "" }}>Administrador(a)</option>
                  @endif
                </select>
                <label>Perfil</label>
              </div>  

              <input type="hidden" name="id" value="{{ $user->id }}">
              <input type="hidden" name="password" value="{{$user->password}}">

              <div class="input-field col s12 l12">
                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                  <i class="material-icons right">save</i>
                </button>
                  
                <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5"><i class="material-icons right">table_rows</i>Listar Alunos</a>
      
                <div class="input-field col s12 l12">
                  <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
        <h4>Confirmação de Edição</h4>
        <p>Deseja realmente editar o usuário {{$user->name}} ?</p>
    </div>

    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Editar</a>
    </div>
  </div>

<!-- Fim de conteudo -->
@endsection

@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);

      let form = document.querySelector('#form_exercise');

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
    
    {{-- 
      o modal é estilizado usando as classes CSS fornecidas pelo Materialize CSS. Usamos a função M.Modal.init() para inicializar o modal e a função instance.open() para abrir o modal quando o formulário for submetido.
      o evento submit é usado para interceptar o envio do formulário, e o modal é aberto nesse momento. Quando o botão "Enviar" dentro do modal é clicado, o formulário é enviado utilizando form.submit(). 
      --}}
  </script>

@endsection