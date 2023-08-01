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
            <th>Nome</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody id="table-body">
          <tr>
            <td id="td-text">Perna</td>
            <td>
      
              <!-- Botão de ação Mobile-->
              <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
              
              <!-- Dropdown de botões -->
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
              </ul>

              <!-- Botão de ações Desktop-->
              <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
            </td>
          </tr>

          <tr>
            <td id="td-text">Costas</td>
            <td>
              
              <!-- Botão de ação Mobile-->
              <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
              
              <!-- Dropdown de botões -->
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
              </ul>

              <!-- Botão de ações Desktop-->
              <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
            </td>
          </tr>

          <tr>
            <td id="td-text">Biceps</td>
            <td>
              
              <!-- Botão de ação Mobile-->
              <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
              
              <!-- Dropdown de botões -->
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
              </ul>

              <!-- Botão de ações Desktop-->
              <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
            </td>
          </tr>

          <tr>
            <td id="td-text">Triceps</td>
            <td>
              
              <!-- Botão de ação Mobile-->
              <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
              
              <!-- Dropdown de botões -->
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
              </ul>

              <!-- Botão de ações Desktop-->
              <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
            </td>
          </tr>

          <tr>
            <td id="td-text">Ombro</td>
            <td>
              
              <!-- Botão de ação Mobile-->
              <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
              
              <!-- Dropdown de botões -->
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!" class="orange darken-4">Editar<i class="material-icons">edit</i></a></li>
                <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
              </ul>

              <!-- Botão de ações Desktop-->
              <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
            </td>
          </tr>

          <!-- Adicione mais registros aqui -->
        </tbody>
      </table>
      <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
      <div id="total-records" class="total-records"></div>
    </div>
  </div>
  
  <!-- Fim de conteudo -->

@endsection 