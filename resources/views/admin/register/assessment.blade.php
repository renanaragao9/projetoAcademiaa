@extends('layouts.admin')

@section('title', 'Avaliação')

@section('content')
      
      <!-- Inicio de conteudo -->
      <div class="row">
      <div class="col s12 m12">
        <div class="card white">
            <div class="card-content">           
              <div class="row">
                <form class="col s12" id="form_group_muscle" action="{{ route('admin.register.assessment.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">

                    <div class="input-field col s12 l12" id="input-exercicio">
                      <h3 id="homeTitle" class="center">Cadastrar nova Avaliação</h3>
                      <h4 id="homeTitle" class="center">Aluno(a) {{ $user->name }}</h4>
                    </div>
                    
                    <div class="input-field col s12">
                      <h4 class="center">Dados da Avaliação</h4>
                    </div>

                    <div class="input-field col s12 l6">
                        <select name="goal" id="input-goal" class="browser-default" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="Hipertrofia">Hipertrofia</option>
                        <option value="Emagrecimento">Emagrecimento</option>
                        <option value="Condicionamento">Condicionamento</option>
                        </select>
                        <label for="meta"><h11>*</h11> Meta</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <select name="term" id="input-term" class="browser-default" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="1 Mês">1 Mês</option>
                        <option value="2 Meses">2 Meses</option>
                        <option value="3 Meses">3 Meses</option>
                        </select>
                        <label for="prazo"><h11>*</h11> Prazo</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <input name="weight" id="weight" type="text" class="validate" required>
                        <label for="weight"><h11>*</h11> Peso:</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <input name="height" id="height" type="text" class="validate" required>
                      <label for="height"><h11>*</h11> Altura:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="arm" id="arm" type="text" class="validate">
                      <label for="arm">Braço:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="forearm" id="forearm" type="text" class="validate">
                      <label for="forearm">Antebraço:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="breastplate" id="breastplate" type="text" class="validate">
                      <label for="breastplate">Peitoral:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="back" id="back" type="text" class="validate">
                      <label for="back">Costas:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="waist" id="waist" type="text" class="validate">
                      <label for="waist">Cintura:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="hip" id="hip" type="text" class="validate">
                      <label for="hip">Quadril:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="glute" id="glute" type="text" class="validate">
                      <label for="glute">Glúteo:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="thigh" id="thigh" type="text" class="validate">
                      <label for="thigh">Coxa:</label>
                    </div>

                    <div class="input-field col s12 l4">
                      <input name="calf" id="calf" type="text" class="validate">
                      <label for="calf">Panturrilha:</label>
                    </div>

                    <div class="input-field col s12 l12">
                      <input name="observation" id="observation" type="text" class="validate">
                      <label for="observation">Observação:</label>
                    </div>

                    <div class="input-field col s12 l4">
                        <input type="hidden" name="id_user_fk" value="{{ $user->id }}" required>
                    </div>

                  <div class="input-field col s12 l12">      
                    <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                      <i class="material-icons right">save</i>
                    </button>
                      
                    <a href="{{ route('admin.table.assessment', $user->id)}}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Avaliações do Aluno</a>
          
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
          <h4>Confirmação da Avaliação</h4>
          <p>Deseja cadastrar a avaliação do(a) aluno(a): {{ $user->name }} ?</p>
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

    let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
    // Define a classe com base na largura da tela
    if (larguraTela > 700) {
        $("#input-goal").removeClass("browser-default");
        $("#input-term").removeClass("browser-default");
    }
    
  </script>
@endsection