<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Outras tags head aqui -->
  <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon">

  
  <!-- LINK DA FONT --> 
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Links dos Icones-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  
  <!-- Link para chamar o chartJS-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
  <!-- Links de customização-->
  <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style_mobile.css') }}">

  
  <title>@yield('title', 'Inicio')</title>
</head>

<body class="grey lighten-5" onload="myFunction()" style="margin: 0;">

  <!-- Botão flutuante Fixo-->
  <div class="fixed-action-btn toolbar direction-top active" id="mobile-fixed-action">
    <ul>
      <li class="waves-effect waves-light"> <a href="{{ route('students.assessment', Auth::user()->id) }}"> <i class="material-icons">analytics</i> </a> </li>
      <li class="waves-effect waves-light"> <a href="{{ route('students.start')}} "> <i class="material-icons">home</i> </a> </li>
      <li class="waves-effect waves-light"> <a href="{{ route('students.profile', Auth::user()->id) }}"> <i class="material-icons">person</i> </a> </li>
    </ul>
  </div>
  
  <!-- Inicio da Sidebar e NavBar-->
  <header> 
    <!-- Sidebar (Menu superior) -->
    <nav>
      <div class="nav-wrapper light-blue darken-4">
        <!-- Botão hamburguer para o mobile-->
        <a href="#" data-target="slide-out" class="sidenav-trigger"> <i class="material-icons">menu</i> </a>

        <!-- Logo Central-->
        <a href="{{ route('students.start') }}" class="brand-logo center"><i class="material-icons left" >fitness_center</i> Renan's </a>
        
        <ul class="right">              
          <li>
            <a href="#" class="tooltipped" id="logout-link" data-position="left" data-tooltip="Sair"><i class="material-icons right">logout</i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sidenav (Menu Lateral)-->
    <ul id="slide-out" class="sidenav light-blue darken-4 z-depth-5">
      <li class="center">
        <div class="user-view">
          <div class="background">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/ocean.jpg')))}}" alt="Imagem de Fundo Oceano">
          </div>
          <div class="center">
            <a href="#user"><img class="circle" id="img-perfil-mobile" src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/profile_photo_path/') . Auth::user()->profile_photo_path)) }}" alt="Imagem de Perfil"></a>
            <a href="#name"><span class="white-text name" id="perfil-mobile-text">{{ auth()->user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
            <a href="#email"><span class="white-text email">ID: {{ auth()->user()->id }}</span></a>
          </div> 
        </div>
      </li>
  
      <li><a class="subheader collapsible">Conteúdo</a></li>

      @if(Auth::user()->profile == 1 || Auth::user()->profile == 2)
        <li class="collapsible"><a href="{{ route('admin.home') }}" class="waves-effect" id="mobile-side"> Painel de controle <i class="material-icons">speed</i></a></li>
      @endif
      <li class="collapsible"><a href="{{ route('students.start') }}" class="waves-effect" id="mobile-side"> Início <i class="material-icons">home</i></a></li>
      <li class="collapsible"><a href="{{ route('students.profile', Auth::user()->id) }}" class="waves-effect" id="mobile-side"> Perfil <i class="material-icons">person</i></a></li>
      <li class="collapsible"><a href="{{ route('students.assessment', Auth::user()->id) }}" class="waves-effect" id="mobile-side"> Avaliação <i class="material-icons">analytics</i></a></li>
      <li class="collapsible"><a href="{{ route('students.payment', Auth::user()->id) }}" class="waves-effect" id="mobile-side"> Planos <i class="material-icons">payments</i></a></li>
      <li class="collapsible"><a href="{{ route('students.called', Auth::user()->id) }}" class="waves-effect" id="mobile-side"> Chamados <i class="material-icons">forum</i></a></li>

      <li><a class="subheader collapsible">Ficha</a></li>

      @foreach ($fichas as $ficha)
        <li class="collapsible"><a href="{{ route('students.ficha', $ficha->id_training_fk) }}" class="waves-effect" id="mobile-side"> {{$ficha->name_training}} <i class="material-icons">fitness_center</i></a></li>
      @endforeach

      <li class="collapsible"><a href="{{ route('students.resetPass', Auth::user()->id) }}" class="waves-effect" id="mobile-side"> Trocar Senha <i class="material-icons">lock_reset</i></a></li>
    </ul>       
  </header>

  <!-- início do preloader -->
  <div id="loader"></div>
  
  <div style="display:none;" id="myDiv" class="animate-bottom">
  
  <!-- Conteúdo -->
  <main>
    <div class="container">
      <div class="row">
        @if(session('msg-error'))
          <div class="flash-message-error">
            <div class="flash-message-content">
              <p>{{ session('msg-error') }}</p>
              <i class="material-icons flash-message-icon">error</i>
            </div>

            <button class="flash-message-close" onclick="this.parentElement.style.display='none'">
              <i class="material-icons">close</i>
            </button>
          </div>               
        
        @elseif(session('msg-success'))
          <div class="flash-message-success">
            <div class="flash-message-content">
              <p>{{ session('msg-success') }}</p>
              <i class="material-icons success-message-icon right">check_circle</i>
            </div>

            <button class="flash-message-close" onclick="this.parentElement.style.display='none'">
              <i class="material-icons">close</i>
            </button>
          </div>
        
        @elseif(session('msg-warning'))
          <div class="flash-message-warning">
            <div class="flash-message-content">
              <p>{{ session('msg-warning') }}</p>
              <i class="material-icons success-message-icon right">warning</i>
            </div>

            <button class="flash-message-close" onclick="this.parentElement.style.display='none'">
              <i class="material-icons">close</i>
            </button>
          </div>                
        
        @elseif($errors->any())
          <div class="flash-message-warning">
            <div class="flash-message-content">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }} <i class="material-icons success-message-icon right">warning</i></li>
                @endforeach
              </ul>
            </div>
          </div> 
        @endif
      </div>
    </div>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/footer.png'))) }}" alt="Rodapé" id="image-footer"/> 
      <p id="copy-mobile">&copy; Todos os direitos reservados.
        <br> Versão: 2.0.1
      </p>
    </div>
  </footer>

  <!-- Código da VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  

  <!-- Inicio das chamdas de Scripts -->
    
    <!-- Jquery-->
    <script src="{{ asset('js/jquery.js') }}"></script> 
    
    <!-- Materialize-->
    <script src="{{ asset('js/materialize.js') }}"></script> 
    
    <!-- Funcoes -->
    <script src="{{ asset('js/funcoes.js') }}"></script> 

    <!-- Bloco de anotações -->
    <script src="{{ asset('js/BlocoDeAnotacoes.js') }}"></script> 

    <!-- Editor de texto -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    <!-- VLIBRAS -->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

    @yield('script')

    <script>
      
      new window.VLibras.Widget('https://vlibras.gov.br/app');

      document.addEventListener('DOMContentLoaded', function() {
        let elems = document.querySelectorAll('.fixed-mobile');
        let instances = M.FloatingActionButton.init(elems, {
          toolbarEnabled: true
        });
      });
    </script>

  <!-- Fim das chamadas de Scripts -->
</body>
</html>