@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

<div class="container">
    <div class="row">
      
      <!--Divs para titulo e Reporte -->
      <div class="row">
        <div class="col s12 l10">
          <h3 id="title-bv">Bom dia, Renan. <p>tenha um bom treino</p> </h3>
        </div>
        
        <div class="col l2" id="button-report">
          <h2>
            <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="#report-modal"><i class="material-icons left" >bug_report</i>Reportar</a>
          </h2>
        </div>
      </div>

      <!--Div para o bloco de notas -->
      <div class="row">
        <div class="col s12">
          <div class="card-panel">
            <h4 id="title-bv"> Bloco de anotações</h4>
            <p class="small" >Faça aqui as suas anotações de treino</p>
      
            <form id="todo-form">
              <div class="input-field">
                <input type="text" id="todo-input" autocomplete="off" placeholder="Digite aqui a sua anotação">
              </div>
              <button class="btn waves-effect waves-light blue accent-2" type="submit">Adicionar</button>
            </form>
      
            <ul id="todo-list" class="collection"></ul>
          </div>
        </div>
      </div>

      <!--Titulo-->
      <div class="row">
        <div class="col s12">
          <h5 id="title-card" class="center">Relação de treino</h5>
        </div>
      </div>
      
      <!-- Card da ficha-->
      <div class="row">
        <a href="ficha_perna.html">
          <div class="card horizontal z-depth-3 waves-light" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">fitness_center</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content ">
                <p>Perna</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Card da ficha-->
      <div class="row">
        <a href="ficha_costas.html">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">fitness_center</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Costas e Biceps</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Card da ficha -->
      <div class="row">
        <a href="ficha_peito.html">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">fitness_center</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Peito, Ombro e Triceps</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Titulo -->
      <div class="row">
        <div class="col s12">
          <h5 id="title-card" class="center">avaliação física, chamados e conteúdo extra</h5>
        </div>
      </div>
      
      <!-- Card da avaliação -->
      <div class="row">
        <a href="avaliacao_aluno.html">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">analytics</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Avaliação</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Card de chamados -->
      <div class="row">
        <a href="chamados_aluno.html">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">forum</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Chamados</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Card do conteudo-->
      <div class="row">
        <a href="#!">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">difference</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Conteúdo extra</p>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>

  @endsection