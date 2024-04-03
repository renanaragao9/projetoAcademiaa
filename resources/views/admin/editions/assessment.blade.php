@extends('layouts.admin')

@section('title', 'Avaliação')

@section('content')
      
      <!-- Inicio de conteudo -->
      <div class="row">
      <div class="col s12 m12">
        <div class="card white">
            <div class="card-content">           
              <div class="row">
                <form class="col s12" id="form_group_muscle" action="{{ route('admin.assessment.update', $assessment->id_assessment) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">

                    <div class="input-field col s12 l12" id="input-exercicio">
                      <h3 id="homeTitle" class="center">Editar Avaliação</h3>
                      <h4 id="homeTitle" class="center">Aluno ({{ $user->name }})</h4>
                    </div>
                    
                    <div class="input-field col s12">
                      <h4 class="center">Especificações da Avaliação</h4>
                    </div>

                    <div class="input-field col s12 l6">
                      <input name="goal" id="goal" type="text" class="validate" value="{{ $assessment->goal }}" readonly  required>
                      <label for="meta"><h11>*</h11> Meta</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <input name="term" id="term" type="text" class="validate" value="{{ $assessment->term }}" readonly required>
                      <label for="meta"><h11>*</h11> Prazo</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <input name="weight" id="weight" type="text" class="validate" value="{{ $assessment->weight }}" required>
                        <label for="weight"><h11>*</h11> Peso:</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <input name="height" id="height" type="text" class="validate" value="{{ $assessment->height }}" required>
                      <label for="height"><h11>*</h11> Altura:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="arm" id="arm" type="text" class="validate" value="{{ $assessment->arm }}">
                      <label for="arm">Braço:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="forearm" id="forearm" type="text" class="validate" value="{{ $assessment->forearm }}">
                      <label for="forearm">Antebraço:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="breastplate" id="breastplate" type="text" class="validate" value="{{ $assessment->breastplate }}">
                      <label for="breastplate">Peitoral:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="back" id="back" type="text" class="validate" value="{{$assessment->back}}">
                      <label for="back">Costas:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="waist" id="waist" type="text" class="validate" value="{{ $assessment->waist }}">
                      <label for="waist">Cintura:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="hip" id="hip" type="text" class="validate" value="{{ $assessment->hip }}">
                      <label for="hip">Quadril:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="glute" id="glute" type="text" class="validate" value="{{ $assessment->glute }}">
                      <label for="glute">Glúteo:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="thigh" id="thigh" type="text" class="validate" value="{{ $assessment->thigh }}">
                      <label for="thigh">Coxa:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="calf" id="calf" type="text" class="validate" value="{{ $assessment->calf }}">
                      <label for="calf">Panturrilha:</label>
                    </div>

                    <div class="input-field col s12 l12">
                      <input name="observation" id="observation" type="text" class="validate" value="{{ $assessment->observation }}">
                      <label for="observation">Observação:</label>
                    </div>

                    <div class="input-field col s12 l4">
                    <input type="hidden" name="id" value="{{ $assessment->id_assessment }}" required >
                        <input type="hidden" name="id_user_fk" value="{{ $assessment->id_user_fk }}" required >
                    </div>

                  <div class="input-field col s12 l12">      
                    <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Editar
                      <i class="material-icons right">save</i>
                    </button>
                      
                    <a href="{{ route('admin.table.assessment', $assessment->id_user_fk)}}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">arrow_back</i>Voltar</a>
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
          <h4>Confirmação da Avaliação</h4>
          <p>Deseja editar a avaliação do aluno: {{ $user->name }} ?</p>
        </div>

        <div class="modal-footer">
          <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
          <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Editar</a>
        </div>
      </div>
      <!-- Fim Inicio de conteudo -->
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
    
    {{-- 
      o modal é estilizado usando as classes CSS fornecidas pelo Materialize CSS. Usamos a função M.Modal.init() para inicializar o modal e a função instance.open() para abrir o modal quando o formulário for submetido.
      o evento submit é usado para interceptar o envio do formulário, e o modal é aberto nesse momento. Quando o botão "Enviar" dentro do modal é clicado, o formulário é enviado utilizando form.submit(). 
      --}}
  </script>
@endsection