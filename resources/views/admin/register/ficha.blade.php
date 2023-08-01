@extends('layouts.admin')

@section('title', 'Cadastro de Ficha')

@section('content')

    <!--Divs para titulo e Reporte -->
      <div class="row">
        <div class="col s12 l10">
          <h3 id="titleColor">Cadastro de Ficha</h3>
          <h5 id="titleColor">Aluno: Renan Aragão</h5>
        </div>
        
        <div class="col l2" id="button-report">
          <h2>
            <a class="waves-effect waves-light btn blue accent-2"><i class="material-icons left" >bug_report</i>Reportar</a>
          </h2>
        </div>
      </div>
      
      <!-- Inicio de conteudo -->
      <div class="row">
      <div class="col s12 m12">
        <div class="card white">
            <div class="card-content">           
              <div class="row">
                <form class="col s12" id="form_ficha" action="{{ route('admin.register.ficha.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">

                    <div class="input-field col s12">
                      <h4 class="center">Divisão do Treino</h4>
                    </div>

                    <div class="input-field col s12 l6">
                      <select name="id_gmuscle_fk_to_ficha" id="groupMuscle">
                        <option value="" disabled selected>Selecione</option>
                        <option value="1">Peito</option>
                        <option value="2">Costas</option>
                        <option value="3">Perna</option>
                        <!-- Adicione mais opções de groupMusc aqui -->
                      </select>
                      <label>Grupo Muscular</label>
                    </div>
                    
                    <div class="input-field col s12 l6">
                      <select name="id_exercise_fk" id="ficha">
                        <option value="" disabled selected>Selecione</option>
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
                  </div>

                  <div class="input-field col s12">
                    <textarea name="observation" id="observation" class="materialize-textarea" data-length="250"></textarea>
                    <label for="observation">Observação:</label>
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
    document.addEventListener('DOMContentLoaded', function() 
    {
      let groupMuscleSelect = document.getElementById('groupMuscle');
      let fichaSelect = document.getElementById('ficha');

      let groupMusc = {
        Peito: ['Supino Reto', 'Crucifixo', 'Supino Declinado'],
        Costas: ['Barra fixa', 'Puxada', 'Remada'],
        Perna: ['Leg 45º', 'Passada', 'Agachamento']
        // Adicione mais grupos aqui
      };

      groupMuscleSelect.addEventListener('change', function() 
      {
        let groupMuscl = this.value;
        fichaSelect.innerHTML = ''; // Limpar as opções do select

        if (groupMuscl !== '') 
        {
          let ficha = groupMusc[groupMuscl];
          
          for (let i = 0; i < ficha.length; i++) {
            let option = document.createElement('option');
            option.value = ficha[i];
            option.text = ficha[i];
            fichaSelect.appendChild(option);
          }
        }
        M.FormSelect.init(fichaSelect); // Reinitialize o select para atualizar as opções
      });

      M.FormSelect.init(groupMuscleSelect);

      // Parte dos modais
      
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);

      let form = document.querySelector('#form_ficha');

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