@extends('layouts.users')

@section('Chamado', 'Painel do Aluno')

@section('content')

    <!-- Inicio de conteudo -->
    <div class="row">
        <div class="col s12 m12">
            <div class="card white">
                <div class="card-content">           
                    <div class="row">
                        <form class="col s12" id="form_called" action="{{ route('admin.called.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12 l12" id="input-exercicio">
                                    <h3 id="titleColor" class="center">Cadastrar um novo Chamado</h3>
                                </div>
                                    
                                <div class="input-field col s12 l12" id="input-exercicio">
                                    <input name="user_name" id="create_called" type="text" class="validate" value="{{ Auth::user()->name }}" readonly required>
                                    <label for="icon-nome">Nome:</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="id_instructor_fk" required>
                                        <option selected disabled>Selecione um Professor:</option>
                                        
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach          
                                    </select>
                                    <label>Professor</label>
                                </div>

                                <div class="input-field col s12 l12">
                                    <select name="urgency" id="create_called">
                                        <option selected disabled>Selecione uma Urgência:</option>
                                        <option value="Urgente">Urgente</option>
                                        <option value="Medio">Médio</option>
                                        <option value="Leve">Leve</option>
                                    </select>
                                    <label>Urgencia</label>
                                </div>

                                <div class="input-field col s12 l12" id="input-exercicio">
                                    <input name="title" id="title" type="text" class="validate" required>
                                    <label for="title">Titulo:</label>
                                </div>

                                <div class="input-field col s12 l12" id="input-exercicio">
                                    <input name="subject" id="subject" type="text" class="validate" placeholder="Faça aqui um resumo da sua chamada" required>
                                    <label for="subject">Descrição:</label>
                                </div>

                                <input name="id_user_fk" type="hidden" value="{{auth::user()->id}}">

                                <div class="input-field col s12 l12">      
                                    <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Criar
                                      <i class="material-icons right">save</i>
                                    </button> 
                          
                                    <div class="input-field col s12 l12">
                                      <a href="{{ route('students.start') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                                    </div>
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
        <h4>Confirmação de Chamado</h4>
        <p>Deseja realmente cadastrar esse chamado ?</p>
    </div>

    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Cadastrar</a>
    </div>
  </div>

@endsection

@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);

      let form = document.querySelector('#form_called');

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