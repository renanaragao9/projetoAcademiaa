@extends('layouts.admin')

@section('title', 'Painel de Controle')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l10">
      <h3 id="titleColor">Painel Administrativo</h3>
    </div>
    
    <div class="col l2" id="button-report">
      <h2>
        <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="#report-modal"><i class="material-icons left" >bug_report</i>Reportar</a>
      </h2>
    </div>
  </div>
  
  <!-- Inicio de conteudo -->

  <!--Div para o bloco de notas -->
  <div class="row">
    <div class="col s12 z-depth-3">
      <div class="card-panel">
        <h4 id="titleColor"> Bloco de anotações</h4>
  
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

  <!-- Titulo -->
  <div class="row">
    <div class="col s12">
        <h5 id="titleColor" class="center">Atalhos e Informações</h5>
    </div>
  </div>
  
  <!--Divs para estatísticas aluno, fichas, chamados etc... -->
  <div class="row">
    <div class="col s12 m6 l3 z-depth-3">
      <a href="#" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">supervisor_account</i>
          <h5>Alunos</h5>
          <h3 class="count">350</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 35%;"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="col s12 m6 l3 z-depth-3">
      <a href="#" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">forum</i>
          <h5>Chamados</h5>
          <h3 class="count">350</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 54%;"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="col s12 m6 l3 z-depth-3">
      <a href="#" class="black-text">
        <div class="card-panel center">
          <i class="material-icons medium" id="blueColor">format_list_bulleted</i>
          <h5>Fichas</h5>
          <h3 class="count">350</h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue accent-2" style="width: 78%;"></div>
          </div>
        </div>
      </a>
    </div>
      
    <div class="col s12 m6 l3 z-depth-3">
      <a href="#" class="black-text">
        <div class="card-panel center ">
            <i class="material-icons medium" id="blueColor">analytics</i>
            <h5>Avaliações</h5>
            <h3 class="count">350</h3>
            <div class="progress grey lighten-1">
              <div class="determinate blue accent-2" style="width: 61%;"></div>
            </div>
        </div>
        </a>
    </div>
  </div>
      
  <!--Div para chamados -->
  <div class="row">
    <div class="col s12 z-depth-3">      
      <ul class="collection">   
        <li class="collection-item avatar">
          <h4 id="titleColor">Chamados</h4>
          <p>Veja abaixo alguns de seus chamados</p>
        </li>
        
        <li class="collection-item avatar">
            <img src="/img/renan.jpeg" alt="" class="circle">
            <span class="title">Renan Aragão</span>
            <p>Troca de senha</p>
            <a href="#!" class="secondary-content"><i class="material-icons" id="blueColor">visibility</i></a>
        </li>
        
        <li class="collection-item avatar">
          <img src="/img/person1.jpg" alt="" class="circle">
          <span class="title">Israel Dantas</span>
          <p>Mudança de ficha</p>
          <a href="#!" class="secondary-content"><i class="material-icons" id="blueColor">visibility</i></a>
        </li>
        
        <li class="collection-item avatar">
          <img src="/img/person2.jpg" alt="" class="circle">
          <span class="title">Lucas Lima</span>
          <p>Solicitação de Avaliação</p>
          <a href="#!" class="secondary-content"><i class="material-icons" id="blueColor">visibility</i></a>
        </li>
        
        <li class="collection-item avatar">
          <img src="/img/person3.jpg" alt="" class="circle">
          <span class="title">Ana Maria</span>
          <p>Solicitação de ficha nova</p>
          <a href="#!" class="secondary-content"><i class="material-icons" id="blueColor">visibility</i></a>
        </li>
      </ul>
    </div>
  </div>

  <!--Div para o ChartJs -->
  <div class="row">
    <div class="col s12 ">
      <div class="card">
        <canvas id="chart"></canvas>
      </div>
    </div>
  </div>

  <!-- Fim de conteudo -->

@endsection