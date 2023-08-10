@extends('layouts.admin')

@section('title', 'Cadastro de Exercício')

@section('content')   
    
  <!-- Inicio de conteudo -->
    <div class="row">
        <div class="col s12 m12">
            <div class="card white">
                <div class="card-content">           
                    <div class="row">
                        <form class="col s12" id="form_exercise" action="{{ route('admin.register.exercise.create') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                              <div class="input-field col s12 l12" id="input-exercicio">
                                <h3 id="titleColor" class="center">Cadastro de Exercício</h3>
                              </div>
                              
                              <div class="input-field col s12 l12" id="input-exercicio">
                                <input name="name_exercise" id="icon-nome" type="text" class="validate">
                                <label for="icon-nome">Nome:</label>
                              </div>

                              <div class="input-field col s12">
                                <select name="id_gmuscle_fk" required>
                                  <option selected disabled>Selecione o Grupo Muscular:</option>
                                  
                                  @foreach ($muscleGroups as $muscleGroup)
                                      <option value="{{ $muscleGroup->id_gmuscle }}">{{ $muscleGroup->name_gmuscle }}</option>
                                  @endforeach          
                                </select>
                                
                              </div>

                              <div class="file-field col s12 l12">
                                <div class="btn light-blue darken-4">
                                    <span>Imagem</span>
                                    <input name="image_exercise" type="file" class="validate" multiple>
                                </div>
                                
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Faça o download da imagem">
                                </div>
                              </div>

                              <div class="input-field col s12 l12">      
                                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                                  <i class="material-icons right">save</i>
                                </button>
                                  
                                <a href="{{ route('admin.table.exercise') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Tabela</a>
                      
                                <div class="input-field col s12 l12">
                                  <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
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
            <h4>Confirmação de Cadastro</h4>
            <p>Deseja realmente cadastrar o Exercício ?</p>
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