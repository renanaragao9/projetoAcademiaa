@extends('layouts.admin')

@section('title', 'Tabela de Grupo Muscular')

@section('content')

  <!-- Inicio de conteudo -->
  <div class="card z-depth-5">
    <div class="card-content">
      <div class="col s12 l10">
        <h3 class="center" id="titleColor" >Tabela de Grupo Muscular</h3>
      </div>
      <div id="total-records" class="total-records"></div>
      <input type="text" id="search" placeholder="Pesquisar...">
      <table class="highlight striped centered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Ação</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @foreach($muscleGroups as $musclegroup)
            <tr>
              <td id="td-text">{{ $musclegroup->name_gmuscle }}</td>
              <td>
                
                <!-- Botão de ação Mobile-->
                <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                
                <!-- Dropdown de botões -->
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                  <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                </ul>

                <!-- Botão de ações Desktop-->
                <a href="{{ route('admin.edit.groupmuscle', $musclegroup->id_gmuscle)}}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>

  <!-- Fim de conteudo -->

@endsection