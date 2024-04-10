@extends('layouts.admin')

@section('title', 'Tabela de Midias')

@section('content')
  
  <!-- Inicio de conteudo -->
  <div class="card z-depth-5">
    <div class="card-content">
      <div class="col s12 l12">
        <h3 class="center" id="homeTitle" >Listagem das  <br> Mídias Postada</h3>
        <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
        <a href="{{ route('admin.register.media') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons right">add</i>Adicionar</a>
      </div>
    </div>

    <h3 class="center" id="homeTitle" >Banners</h3>

    <div class="card-content">
      <table class="highlight striped centered">
        <thead>
          <tr>
            <th class="hide-on-small-only">ID</th>
            <th class="hide-on-small-only">Imagem</th>
            <th class="hide-on-small-only">Criador</th>
            <th>Titulo</th>
            <th class="hide-on-small-only">Criado</th>
            <th class="hide-on-small-only">Modificado</th>
            <th>Ação</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @foreach( $medias_banners as $media)
            <tr>
              <td class="hide-on-small-only" id="td-text">{{ $media->id_media }}</td>
              <td class="hide-on-small-only" id="td-text"> <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/media/') . $media->img_media)) }}" alt="Imagem do Banner {{$media->title_media}}" class="circle materialboxed" id="table-image"></td>
              <td class="hide-on-small-only" id="td-text">{{ $media->users->name }}</td>
              <td class="grupo-muscular" id="td-text">{{ $media->title_media }}</td>
              <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($media->created_at)->format('d/m/Y - H:i:s') }}</td>
              <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($media->updated_at)->format('d/m/Y - H:i:s') }}</td>
              <td>
                <!-- Botão de ações Desktop-->
                <a href="{{ route('admin.media.edit', $media->id_media)}}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                
                <form action="{{ route('admin.media.destroy', $media->id_media) }}" method="POST" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $media->id_media }}">
                  <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Inicio de conteudo -->
  <div class="card z-depth-5">
    <div class="card-content">
      <div class="col s12 l12">
        <h3 class="center" id="homeTitle" >Posts</h3>
    </div>

    <div class="card-content">
      <table class="highlight striped centered">
        <thead>
          <tr>
            <th class="hide-on-small-only">ID</th>
            <th class="hide-on-small-only">Imagem</th>
            <th class="hide-on-small-only">Criador</th>
            <th>Titulo</th>
            <th class="hide-on-small-only">Criado</th>
            <th class="hide-on-small-only">Modificado</th>
            <th>Ação</th>
          </tr>
        </thead>
        
        <tbody id="table-body">
          @foreach( $medias_post as $media)
            <tr>
              <td class="hide-on-small-only" id="td-text">{{ $media->id_media }}</td>
              <td class="hide-on-small-only" id="td-text" > <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/media/') . $media->img_media)) }}" alt="" class="circle materialboxed" id="table-image"></td>
              <td class="hide-on-small-only" id="td-text">{{ $media->users->name }}</td>
              <td class="grupo-muscular" id="td-text">{{ $media->title_media }}</td>
              <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($media->created_at)->format('d/m/Y - H:i:s') }}</td>
              <td class="hide-on-small-only" id="td-text">{{ \Carbon\Carbon::parse($media->updated_at)->format('d/m/Y - H:i:s') }}</td>
              <td>
                <!-- Botão de ações Desktop-->
                <a href="{{ route('admin.media.edit', $media->id_media)}}" class="btn-floating tooltipped orange darken-4 btn-large waves-effect waves-light red" id="action-table-desktop" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                                
                <form action="{{ route('admin.media.destroy', $media->id_media) }}" method="POST" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $media->id_media }}">
                  <button class="btn-floating tooltipped red darken-4 btn-large waves-effect waves-light red delete-button" id="bottom-table-action" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete_forever</i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
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
  </script>
@endsection