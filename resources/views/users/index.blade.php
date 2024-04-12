@extends('layouts.users')

@section('title', 'Início')

@section('content')
 
  <div class="container">
    <div class="row">

      @if($msg_warning)
        <div class="flash-message-warning">
          <div class="flash-message-content">
            <p>{{ $msg_warning }}</p>
            <i class="material-icons success-message-icon right">warning</i>
          </div>
    
          <button class="flash-message-close" onclick="this.parentElement.style.display='none'">
            <i class="material-icons">close</i>
          </button>
        </div>  
      @endif
      
      <!--Divs para titulo e Reporte -->
      <div class="card" id="card-tile-mobile">
        <div class="row">
          <div class="col s12 l10">
            <i class="material-icons" id="homeUserTitle-icon">home</i>
              <h3 id="homeUserTitle"> {{ $firstName }}.</h3>
          </div>
        </div>
      </div>

      <!-- BANNERS -->
      <div class="carousel-container">
        <div class="carousel-slide">
          @foreach ($mediaBanners as $media)
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/media/') . $media->img_media )) }}" alt="{{$media->title_media}}" class="carousel-item">
          @endforeach
        </div>
        
        <div class="indicator-container"></div>

        <button class="prev-button" onclick="changeSlide(-1)"><i class="material-icons">chevron_left</i></button>
        <button class="next-button" onclick="changeSlide(1)"><i class="material-icons">chevron_right</i></button>
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
              <button class="btn blue accent-2" type="submit">Adicionar</button>
            </form>
      
            <ul id="todo-list" class="collection"></ul>
          </div>
        </div>
      </div>

      <!--Titulo-->
      <div class="row">
        <div class="col s12" id="cardTextTitle">
          <h5 id="homeUserTitle" class="center">Relação de Treino</h5>
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
              <a href="{{route('fichaDownload', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light deep-orange accent-3">Baixar Ficha <i class="material-icons right">download</i> </a>
            @endif
          </div>
        @endforeach
      @else
        <p id="error-not-ficha">Você ainda não possui uma ficha de treino.</p>
      @endif

      <!-- Titulo -->
      <div class="row">
        <div class="col s12" id="cardTextTitle">
          <h5 id="homeUserTitle" class="center">Avaliação Física, Chamados e Conteúdo Extra</h5>
        </div>
      </div>

      <!-- Card de Mensalidades -->
      <div class="row">
        <a href="{{ route('students.profile', Auth::user()->id) }}">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">person</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Perfil</p>
              </div>
            </div>
          </div>
        </a>
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
          <a href="{{route('assessmentDownload', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light deep-orange accent-3">Baixar Avaliação <i class="material-icons right">download</i> </a>
        @endif
      </div>

      <!-- Card de Mensalidades -->
      <div class="row">
        <a href="{{ route('students.payment', Auth::user()->id) }}">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">payments</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Planos</p>
              </div>
            </div>
          </div>
        </a>
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

      <!-- Card de Post -->
      <div class="row">
        <a href="{{ route('students.posts')}}">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">tag</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Posts</p>
              </div>
            </div>
          </div>
        </a>
      </div>


      <!-- Card de Post -->
      <div class="row">
        <a href="{{ asset('Academia Renan´s.apk') }}">
            <div class="card horizontal z-depth-3 modal_app" id="card-mobile">
                <div class="card-image">
                    <i class="material-icons" id="icon-card-mobile">android</i>
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>Aplicativo Android</p>
                    </div>
                </div>
            </div>
        </a>
      </div>
    </div>
  </div>

  <div id="modal-alerta" class="modal">
    <div class="modal-content">
      <i class="material-icons" id="modal-icon-alert">info</i>
      <h4>Informação sobre o aplicativo</h4>
      <p>Este aplicativo não está disponível na Play Store, mas pode ser baixado como um arquivo APK. Ele é completamente seguro e leve. Ao baixá-lo, serão solicitadas algumas permissões. Gostaria de prosseguir?</p>
    </div>

    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
      <a href="{{ asset('Academia Renan´s.apk') }}" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="confirmDeleteBtn">Sim</a>
    </div>
  </div>

@endsection

@section('script')
  <script>
    const firstName = "{{ $firstName }}";

    document.addEventListener('DOMContentLoaded', function() {
      let modal = document.getElementById('modal-alerta');
      let instance = M.Modal.init(modal);
      let deleteButtons = document.querySelectorAll('.modal_app');

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
            instance.close();
          });
        });
      });
    });
  </script>
  <script src="{{ asset('js/mobile/index.js') }}"></script>
@endsection
