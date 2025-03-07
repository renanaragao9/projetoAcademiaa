@extends('layouts.admin')

@section('title', 'Tabela de Exercicios do aluno')

@section('content')

  <!-- Inicio de conteudo -->
  @foreach($exerciciosPorDivisao as $nomeDivisao => $exercicios)
    <div class="card z-depth-5">
      <div class="card-content">
        <div class="col s12 l12">
          <h3 class="center" id="homeTitle"><a href="{{ route('admin.register.ficha', $fichaUsers[0]->id_user_fk) }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a> Listagem de Exercícios</h3>
          <h5 class="center col s12" id="homeTitle">Nome: {{$userName->user->name}}</h5>
          <h4 class="center" id="homeTitle">Exercício: {{$nomeDivisao}}</h4>
        </div>
      </div>

      <div class="card-content">
        <table class="highlight striped">
          <thead>
            <tr>
              <th>Exercício</th>
              <th>Ordem</th>
              <th class="hide-on-small-only">Criado</th>
              <th class="hide-on-small-only">Modificado</th>
              <th>Ação</th>
            </tr>
          </thead>
          
          <tbody id="table-body">
            @foreach( $exercicios as $fichaUser)
              <tr>
                <td id="td-text"> {{ $fichaUser->exercise->name_exercise }} </td>
                <td id="td-text">{{ $fichaUser->order }}º</td>
                <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($fichaUser->created_at)->format('d/m/Y - H:i:s') }}</td>
                <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($fichaUser->updated_at)->format('d/m/Y - H:i:s') }}</td>
                <td>
                  <!-- Botão de ações Desktop-->
                  <a href="{{ route('admin.edit.ficha', $fichaUser->id_ficha) }}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                  
                  <form action="{{ route('admin.ficha.destroy' , $fichaUser->id_ficha) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="$fichaUser->id_ficha">
                    <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endforeach
  
  <!-- Fim de conteudo -->
  
  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Confirmação de Exclusão</h4>
      <p>Deseja realmente excluir esse registro?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Excluir</a>
    </div>
  </div>
@endsection 

@section('script')
  <script>
        
    // Inicio da função do alerta modal ao excluír dados
    document.addEventListener('DOMContentLoaded', function() {
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let deleteButtons = document.querySelectorAll('.delete-button');

      deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          let form = button.closest('.delete-form');
          instance.open();

          let cancelBtn = document.querySelector('.modal-footer #cancelBtn');
          cancelBtn.addEventListener('click', function() {
            instance.close();
          });

          let confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
          confirmDeleteBtn.addEventListener('click', function() {
            form.submit();
            instance.close(); // Fechar o modal após a exclusão ser confirmada e o formulário ser enviado.
          });
        });
      });
    });
    
    {{-- 
      o modal é estilizado usando as classes CSS fornecidas pelo Materialize CSS. Usamos a função M.Modal.init() para inicializar o modal e a função instance.open() para abrir o modal quando o formulário for submetido.
      o evento submit é usado para interceptar o envio do formulário, e o modal é aberto nesse momento. Quando o botão "Enviar" dentro do modal é clicado, o formulário é enviado utilizando form.submit(). 
      --}}
  </script>
@endsection