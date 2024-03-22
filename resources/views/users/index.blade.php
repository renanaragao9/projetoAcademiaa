@extends('layouts.users')

@section('title', 'Painel do Aluno')

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
            <img src="/img/media/{{$media->img_media}}" alt="{{$media->title_media}}" class="carousel-item">
          @endforeach
          <!-- Adicione mais imagens conforme necessário -->
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
              <button class="btn waves-effect waves-light blue accent-2" type="submit">Adicionar</button>
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
              <a href="{{route('fichaDownload', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light orange darken-4">Baixar Ficha <i class="material-icons right">download</i> </a>
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
          <a href="{{route('assessmentDownload', $ficha->id_training_fk)}}" class="btn-small waves-effect waves-light orange darken-4">Baixar Avaliação <i class="material-icons right">download</i> </a>
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
    </div>
  </div>

@endsection

@section('script')
  <script>
    let currentIndex = 0;

    function changeSlide(index) {
      const slides = document.querySelector('.carousel-slide');
      const totalSlides = document.querySelectorAll('.carousel-item').length;

      currentIndex = (currentIndex + index + totalSlides) % totalSlides;

      const translateValue = -currentIndex * 100 + '%';
      slides.style.transform = 'translateX(' + translateValue + ')';
      updateIndicators();
    }

    function updateIndicators() {
      const indicators = document.querySelectorAll('.indicator');
      indicators.forEach((indicator, index) => {
        indicator.classList.remove('active');
        if (index === currentIndex) {
          indicator.classList.add('active');
        }
      });
    }

    function autoChangeSlide() {
      changeSlide(1);
    }

    setInterval(autoChangeSlide, 3000);

    const totalSlides = document.querySelectorAll('.carousel-item').length;
    const indicatorContainer = document.querySelector('.indicator-container');

    for (let i = 0; i < totalSlides; i++) {
      const indicator = document.createElement('div');
      indicator.classList.add('indicator');
      indicatorContainer.appendChild(indicator);

      indicator.addEventListener('click', () => {
        changeSlide(i);
      });
    }

    updateIndicators();

    document.addEventListener('DOMContentLoaded', function() {
      // Função para obter a saudação com base na hora do dia
      function getSaudacao() {
          const agora = new Date();
          const hora = agora.getHours();

          let saudacao;

          if (hora >= 5 && hora < 12) {
              saudacao = 'Bom dia';
          } else if (hora >= 12 && hora < 18) {
              saudacao = 'Boa tarde';
          } else {
              saudacao = 'Boa noite';
          }

          return saudacao;
      }

      // Exibe a saudação na página
      const saudacaoElemento = document.getElementById('homeUserTitle');
      const saudacaoTexto = getSaudacao();
      saudacaoElemento.innerHTML = `${saudacaoTexto}, {{ $firstName }}. <br> Tenha um bom treino!`;

      const likeButton = document.querySelector('.like');
      likeButton.addEventListener('click', function() {
        const icon = this.querySelector('.material-icons');
        icon.classList.toggle('liked');
      });
    });
  </script>
@endsection
