@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

  <div class="container">
    <div class="row">
      
      <!--Divs para titulo e Reporte -->
      <div class="row">
        <div class="col s12 l10">
          <h3 id="homeUserTitle">Bom dia, {{$firstName}}. <p id="textUserWelcome">tenha um bom treino</p> </h3>
        </div>
      </div>  
      <!--Div para o bloco de notas -->
      <div class="row">
        <div class="col s12" id="cardNotepad">
          <div class="card-panel">
            <h4 id="homeUserTitle"> Bloco de anotações</h4>
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
        <div class="col s12" id="cardTextTitle">
          <p id="underlineTitle">-=-=-=-=-=-=-=-=-=-=-=-</p>
          <h5 id="homeUserTitle" class="center">Relação de treino</h5>
          <p id="underlineAfterTitle">-=-=-=-=-=-=-=-=-=-=-=-</p>
        </div>
      </div>
      
      @if($fichas->count() > 0)
        <!-- Card da ficha-->
        @foreach ($fichas as $ficha)
          <div class="row">
            <a href="{{ route('students.ficha', $ficha->id_training_fk) }}">
              <div class="card horizontal z-depth-3 waves-light" id="card-mobile">
                <div class="card-image">
                  <i class="material-icons" id="icon-card-mobile">fitness_center</i> 
                </div>
                
                <div class="card-stacked">
                  <div class="card-content ">
                    <p>{{$ficha->name_training}}</p>
                  </div>
                </div>
              </div>
            </a>
          </div>    
          <div class="center" id="div-donwload-pdf">
            @if($fichas->count() > 0)
              <a href="{{route('students.pdf', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light orange darken-4">Baixar Ficha <i class="material-icons right">download</i> </a>
            @endif
          </div>
        @endforeach
      @else
        <p id="error-not-ficha">Você ainda não possui uma ficha de treino.</p>
      @endif

      <!-- Titulo -->
      <div class="row">
        <div class="col s12" id="cardTextTitle">
          <p id="underlineTitle">-=-=-=-=-=-=-=-=-=-=-=-</p>
          <h5 id="homeUserTitle" class="center">avaliação física, chamados e conteúdo extra</h5>
          <p id="underlineAfterTitle">-=-=-=-=-=-=-=-=-=-=-=-</p>
        </div>
      </div>
      
      <!-- Card da avaliação -->
      <div class="row">
        <a href="{{ route('students.assessment', Auth::user()->id) }}">
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
      <div class="center" id="div-donwload-pdf">
        @if($fichas->count() > 0)
          <a href="{{route('students.assessment-pdf', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light orange darken-4">Baixar Avaliação <i class="material-icons right">download</i> </a>
        @endif
      </div>
      <!-- Card de chamados -->
      <div class="row">
        <a href="{{ route('students.called', Auth::user()->id) }}">
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
    </div>
  </div>

@endsection