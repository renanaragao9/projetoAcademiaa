@extends('layouts.admin')

@section('title', 'Tabela de Exercícios')

@section('content')

  <!--Divs para titulo e Reporte -->
  <div class="row">
    <div class="col s12 l10">
      <h3 id="titleColor">Tabela de Exercícios</h3>
    </div>
    
    <div class="col l2" id="button-report">
      <h2>
        <a class="waves-effect waves-light btn blue accent-2"><i class="material-icons left" >bug_report</i>Reportar</a>
      </h2>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  <div class="card z-depth-5">
    <div class="card-content">
      <div id="total-records" class="total-records"></div>
      <input type="text" id="search" placeholder="Pesquisar...">
      <table class="highlight striped centered">
        <thead>
          <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Grupo Muscular</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody id="table-body">
          @foreach( $exercises as $exercise)
            <tr>
              <td id="td-text"> <img src="/img/exercise/{{$exercise->image_exercise}}" alt="" class="circle materialboxed" id="table-image"></td>
              <td id="td-text">{{ $exercise->name_exercise }}</td>
              <td id="td-text">{{ $exercise->groupMuscle->name_gmuscle }}</td>
              
              <td>
                <!-- Botão de ações Desktop-->
                <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
              </td>
            </tr>
          @endforeach
          
          <!-- Adicione mais registros aqui -->
        </tbody>
      </table>
      
      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>
  
  <!-- Fim de conteudo -->

@endsection 