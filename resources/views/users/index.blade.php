@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

  <div class="container">
    <div class="row">
      
      <!--Divs para titulo e Reporte -->
      <div class="row">
        <div class="col s12 l10">
            <h3 id="homeUserTitle"> {{ $firstName }}. <br> <p id="textUserWelcome">tenha um bom treino</p></h3>
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

      <!-- Post -->
      <div class="post-container">
        <div class="post-header">
          <img src="/img/ocean.jpg" alt="Avatar" class="avatar">
          <div class="username">John Doe</div>
          <div class="post-time">2 hours ago</div>
        </div>
        <div class="post-content">
          This is a sample post content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
        <img src="/img/ocean.jpg" alt="Post Image" class="post-image">
        <div class="post-tags">
          <span class="tag">Tag1</span>
          <span class="tag">Tag2</span>
          <span class="tag">Tag3</span>
        </div>
        <div class="post-footer">
          <a class="icon like"><i class="material-icons">thumb_up</i> Like</a>
          <a href="#" class="icon"><i class="material-icons">comment</i> Comment</a>
          <a href="#" class="icon"><i class="material-icons">share</i> Share</a>
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
          <h5 id="homeUserTitle" class="center">Relação de treino</h5>
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
          <h5 id="homeUserTitle" class="center">avaliação física, chamados e conteúdo extra</h5>
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

      <!-- Card de Post -->
      <div class="row">
        <a href="{{ route('students.posts')}}">
          <div class="card horizontal z-depth-3" id="card-mobile">
            <div class="card-image">
              <i class="material-icons" id="icon-card-mobile">share</i>
            </div>
            
            <div class="card-stacked">
              <div class="card-content">
                <p>Postagens</p>
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

    setInterval(autoChangeSlide, 2000);

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
      saudacaoElemento.textContent = `${saudacaoTexto}, {{ $firstName }}. Tenha um bom treino.`;

      const likeButton = document.querySelector('.like');
      likeButton.addEventListener('click', function() {
        const icon = this.querySelector('.material-icons');
        icon.classList.toggle('liked');
      });
    });
  </script>
@endsection
