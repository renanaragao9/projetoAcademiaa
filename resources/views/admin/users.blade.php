@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

    <!--Divs para titulo e Reporte -->
    <div class="row">
        <div class="col s12 l10">
          <h3 id="titleColor">Painel de Alunos</h3>
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
                <th>Email</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody id="table-body">
              <tr>
                <td id="td-text">Renan Aragão</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#!" data-target="dropdown1" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="{{ route('admin.register.ficha') }}" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a href="{{ route('admin.register.ficha') }}" class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>

              <tr>
                <td id="td-text">Marcos Lima</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown5" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown5" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Inaria Anastacio</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown3" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown3" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Juan Victor</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Maria Clara</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Giovanny Robson</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Brenda Ramos</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Eudes Junior</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Camila Leão</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              <tr>
                <td id="td-text">Israel Dantas</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>

              <tr>
                <td id="td-text">Vanessa Carvalho</td>
                <td id="td-text">johndoe@example.com</td>
                <td>  
                  
                  <!-- Botão de ação Mobile-->
                  <a class="waves-effect waves-light orange darken-4 btn-floating  dropdown-table" id="action-table-mobile" href="#" data-target="dropdown2" href="#!" ><i class="material-icons">arrow_drop_down</i></a>
                  
                  <!-- Dropdown de botões -->
                  <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!" class="orange darken-4">Perfil<i class="material-icons">person</i></a></li>
                    <li><a href="#!" class="light-blue darken-4">Ficha<i class="material-icons">backup_table</i></a></li>
                    <li><a href="#!" class="grey darken-4 white-text">Avaliação<i class="material-icons">assignment</i></a></li>
                    <li><a href="#!" class="teal darken-4 white-text">Resetar senha<i class="material-icons">lock_reset</i></a></li>
                    <li><a href="#!" class="red darken-4 white-text">Excluir<i class="material-icons">delete_forever</i></a></li>
                  </ul>

                  <!-- Botão de ação Desktop-->
                  <a class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Perfil"><i class="material-icons">person</i></a>
                  <a class="btn-floating tooltipped light-blue darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Ficha"><i class="material-icons">backup_table</i></a>
                  <a class="btn-floating tooltipped grey darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Avaliação"><i class="material-icons">assignment</i></a>
                  <a class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Resetar senha"><i class="material-icons">lock_reset</i></a>
                  <a class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></a>
                </td>
              </tr>
              
              <!-- Adicione mais registros aqui -->
            </tbody>
          </table>

          <!-- Chamada para o botao de pesquisar... -->
          <div id="no-results" class="no-results-message" style="display: none;">Nenhum registro encontrado</div>
          <div id="total-records" class="total-records"></div>
        </div>
      </div>

      <!-- Fim de conteudo -->

@endsection

@section('script')
  <script>   
    // Função para filtrar os registros da tabela
    function filterTable() {
        let input = document.getElementById('search');
        let filter = input.value.toLowerCase();
        let rows = document.getElementById('table-body').getElementsByTagName('tr');
        let noResultsMessage = document.getElementById('no-results');
        let totalRecords = document.getElementById('total-records');

        let resultsFound = false;
        let count = 0;

        for (let i = 0; i < rows.length; i++) {
          let nome = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
          let email = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
          let aluno = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();

          if (nome.indexOf(filter) > -1 || email.indexOf(filter) > -1 || aluno.indexOf(filter) > -1) {
            rows[i].style.display = '';
            resultsFound = true;
            count++;
          } else {
            rows[i].style.display = 'none';
          }
        }

        if (resultsFound) {
          noResultsMessage.style.display = 'none';
        } else {
          noResultsMessage.style.display = 'block';
        }

        totalRecords.innerText = "Total de registros encontrados: " + count;
      }

      // Evento de input para acionar a filtragem ao digitar na caixa de pesquisa
      document.getElementById('search').addEventListener('input', filterTable);
  </script>
@endsection