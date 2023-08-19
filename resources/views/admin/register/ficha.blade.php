@extends('layouts.admin')

@section('title', 'Cadastro de Ficha')

@section('content')
      
      <!-- Inicio de conteudo -->
      <div class="row">
      <div class="col s12 m12">
        <div class="card white">
            <div class="card-content">           
              <div class="row">
                <form class="col s12" id="form_ficha" action="{{ route('admin.register.ficha.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">

                    <div class="input-field col s12 l12" id="input-exercicio">
                      <h3 id="titleColor" class="center">Ficha de Treino</h3>
                      <h4 id="titleColor" class="center">Aluno: {{ $user->name }}</h4>
                    </div>

                    <div class="input-field col s12">
                      <h4 class="center">Divisão do Treino</h4>
                    </div>

                    <div class="input-field col s12 l6">
                      <select name="id_training_fk" id="ficha">
                        <option value="" disabled selected>Selecione</option>
                        
                        @foreach ($trainings as $training)
                          <option value="{{ $training->id_training }}"> {{$training->name_training}} </option>
                        @endforeach
                      </select>
                      <label>Treino</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <select name="order" id="ficha">
                        <option value="" disabled selected>Selecione</option>
                        
                        @foreach ($numbers as $number)
                          <option value="{{$number}}"> {{$number}}° </option>
                        @endforeach
                      </select>
                      <label>Ordem do exercício</label>
                    </div>

                    <div class="input-field col s12 l6">
                      <select name="id_gmuscle_fk_to_ficha" id="groupMuscle">
                        <option value="" disabled selected>Selecione</option>
                        
                        @foreach ($muscleGroups as $muscleGroup)
                          <option value="{{$muscleGroup->id_gmuscle}}"> {{$muscleGroup->name_gmuscle}} </option>
                        @endforeach
                      </select>
                      <label>Grupo Muscular</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <select name="id_exercise_fk" id="exercises">

                      </select>
                      <label>Exercício</label>
                    </div>
                    
                    <div class="input-field col s12">
                      <h4 class="center">Especificação do Exercício</h4>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <input name="serie" id="serie" type="tel" class="validate">
                        <label for="serie">Série:</label>
                    </div>
                    
                    <div class="input-field col s12 l6">                      
                      <input name="repetition" id="repetition" type="tel" class="validate">
                      <label for="repetition">Repetição:</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <input name="weight" id="weight" type="tel" class="validate">
                        <label for="weight">Peso:</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <input name="rest" id="rest" type="tel" class="validate">
                      <label for="rest">Descanso:</label>
                    </div>

                    <div class="input-field col s12 l6">
                      <input type="hidden" name="id_user_fk" value="{{ $user->id }}">
                      <input type="hidden" name="id_user_creator_fk" value="{{ Auth::user()->id }}">
                    </div>

                  <div class="input-field col s12">
                    <textarea name="description" id="observation" class="materialize-textarea" data-length="250"></textarea>
                    <label for="observation">Observação:</label>
                  </div>

                </div>
                  <div class="input-field col s12 l12">      
                    <button class="btn waves-effect waves-light light-blue darken-4" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                      <i class="material-icons right">save</i>
                    </button>
              
                    <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn right light-blue darken-4" id="botao-cancelar"><i class="material-icons right">cancel</i>Cancelar</a>
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
          <p>Deseja realmente cadastrar o exercício da ficha ?</p>
        </div>

        <div class="modal-footer">
          <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
          <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Cadastrar</a>
        </div>
      </div>
      <!-- Fim Inicio de conteudo -->
@endsection

@section('script')
  <script>
    //Função para popular o select exercicio atraves da escolha do select Grupo Muscular
    $(document).ready(function () {
      $('select').formSelect();
      
      $('#groupMuscle').change(function () {
        var muscleGroupId = $(this).val();
          if (muscleGroupId) {
            $.ajax({
              url: 'select/' + muscleGroupId,
              type: 'GET',
              success: function (data) {
                  $('#exercises').empty();
                  $('#exercises').append($('<option>', {
                    value: '',
                    text: 'Selecionar'
                  }));
                  $.each(data, function (index, exercise) {
                    $('#exercises').append($('<option>', {
                      value: exercise.id_exercise,
                      text: exercise.name_exercise
                    }));
                  });
                  
                  $('#exercises').formSelect();
              }
            });
          } else {
              $('#exercises').empty();
              $('#exercises').formSelect();
          }
      });
    });
  </script>
@endsection