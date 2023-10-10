<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Links dos Icones-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Link para chamar o chartJS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     
    <!-- Links de customização-->
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/style_admin.css">
    
    <title>@yield('title', 'Inicio')</title>
</head>

<body class="grey lighten-5" onload="myFunction()" style="margin: 0;">

  <!-- Botão flutuante Fixo-->
  <div class="fixed-action-btn toolbar direction-top active" id="mobile-fixed-action">
    <ul>
      <li class="waves-effect waves-light"> <a href="avaliacao_aluno.html"> <i class="material-icons">analytics</i> </a> </li>
      <li class="waves-effect waves-light"> <a href="index_mobile.html"> <i class="material-icons">home</i> </a> </li>
      <li class="waves-effect waves-light"> <a href="chamados_aluno.html"> <i class="material-icons">forum</i> </a> </li>
    </ul>
  </div>
  
  <!-- Inicio da Sidebar e NavBar-->
    <header> 
        <!-- Sidebar (Menu superior) -->
        <nav>
            <div class="nav-wrapper light-blue darken-4">
                <!-- Botão hamburguer para o mobile-->
                <a href="#" data-target="slide-out" class="sidenav-trigger">
                <i class="material-icons">menu</i>
                </a>

                <!-- Botão de sair para o mobile-->
                <a href="#" data-target="slide-out" id="nav-mobile-icon" class="sidenav-trigger right">
                <i class="material-icons">logout</i>
                </a>

                <!-- Logo Central-->
                <a href="index_mobile.html" class="brand-logo center">
                <i class="material-icons left" >fitness_center</i>
                Israel Dantas
                </a>
                
                <ul class="right hide-on-med-and-down">              
                <li>
                    <a href="sass.html"></a>
                </li>
                    <li>
                        <!-- Dropdown Menu -->
                        <li><a href="#!" id="nav-name">Renan Aragão</a></li>
                        <li class="dropdown-trigger" data-target="dropdown"><img src="/img/renan.jpeg" alt="" id="nav-image" class="circle responsive-img"><i class="material-icons right">arrow_drop_down</i></li>
                        <!-- Estrutura do Dropdown -->
                        <ul id="dropdown" class="dropdown-content">
                            <li><a href="#!" class="black-text"><i class="material-icons" id="blueColor">person</i>Perfil</a></li>
                            <li><a href="#!" class="black-text"><i class="material-icons" id="blueColor">view_cozy</i>Log</a></li>
                            <li class="divider"></li><li class="divider"></li><li class="divider"></li>
                            <li><a href="#!" class="black-text"><i class="material-icons" id="blueColor">logout</i>Sair</a></li>
                        </ul>
                </li>
                </ul>
            </div>
        </nav>

        <!-- Sidenav (Menu Lateral)-->
        <ul id="slide-out" class="sidenav light-blue darken-4 z-depth-5">
            <li class="center">
                <div class="user-view">
                <div class="background">
                    <img src="/img/ocean.jpg">
                </div>

                <a href="#user"><img class="circle" id="img-perfil-mobile" src="/img/renan.jpeg"></a>
                <a href="#name"><span class="white-text name" id="perfil-mobile-text">Renan Aragao</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
        
        <li> <a class="subheader collapsible">Conteúdo</a> </li>

        <li class="collapsible"><a href="index.html" class="waves-effect" id="mobile-side"> Painel de controle <i class="material-icons">speed</i></a></li>
        <li class="collapsible"><a href="#!" class="waves-effect" id="mobile-side"> Perfil <i class="material-icons">person</i></a></li>
        <li class="collapsible"><a href="avaliacao_aluno.html" class="waves-effect" id="mobile-side"> Avaliação <i class="material-icons">analytics</i></a></li>
        <li class="collapsible"><a href="chamados_aluno.html" class="waves-effect" id="mobile-side"> Chamados <i class="material-icons">forum</i></a></li>

        <li><a class="subheader collapsible">Ficha</a></li>

        <li class="collapsible"><a href="ficha_perna.html" class="waves-effect" id="mobile-side"> Perna <i class="material-icons">fitness_center</i></a></li>
        <li class="collapsible"><a href="ficha_peito.html" class="waves-effect" id="mobile-side1"> Peito, Ombro e Triceps <i class="material-icons">fitness_center</i></a></li>
        <li class="collapsible"><a href="ficha_costas.html" class="waves-effect" id="mobile-side"> Costas e Biceps <i class="material-icons">fitness_center</i></a></li>
        </ul>       
    </header>

  <!-- início do preloader -->
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom"> 
  
  <!-- Conteúdo -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="section light-blue darken-4 white-text center">
    
  </footer>

  <!-- Inicio das chamdas de Scripts -->
    
    <!-- Jquery-->
    <script src="/js/jquery.js"></script> 
    
    <!-- Materialize-->
    <script src="/js/materialize.js"></script>
    
    <!-- Funcoes -->
    <script src="/js/funcoes.js"></script>

    <!-- Bloco de anotações -->
    <script src="/js/BlocoDeAnotacoes.js"></script>

    <!-- Editor de texto -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    @yield('script')

    <script>
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