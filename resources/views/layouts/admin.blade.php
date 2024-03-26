<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Links dos Icones-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Link para chamar o chartJS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Links de customização-->
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/style_admin.css">
    <link rel="stylesheet" href="/css/style_mobile.css">
    
    <title>@yield('title', 'Israel Dantas')</title>
</head>

<body class="grey lighten-5" onload="myFunction()">

    <!-- Botão Flutuante-->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue darken-4"><i class="large material-icons">mode_edit</i></a>
        
        <ul>
            <li>
                <a class="btn-floating modal-trigger light-blue darken-4" href="#report-modal"><i class="material-icons">bug_report</i></a>
            </li>
            
            <li>
                <a class="btn-floating light-blue darken-4" href="{{ route('admin.called') }}"><i class="material-icons">forum</i></a>
            </li> 

            <li>
                <a class="btn-floating light-blue darken-4" href="{{route('admin.statistic')}}"><i class="material-icons">insert_chart</i></a>
            </li>
            
            <li>
                <a class="btn-floating modal-trigger light-blue darken-4" href="{{ route('admin.user.create') }}"><i class="material-icons">person_add</i></a>
            </li>
        </ul>
    </div>
  
    <!-- Inicio da Sidebar e NavBar-->
    <header>
    
        <!-- Sidebar (Menu superior) -->
        <nav>
            <div class="nav-wrapper light-blue darken-4">
        
                <a href="#" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>

                <ul class="right" id="nav-mobile-icon">
                    <li>
                        <a href="#" class="tooltipped rigth" id="logout-link-mobile" data-target="slide-out"  data-tooltip="Sair"><i class="material-icons right">logout</i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                
                <a href="{{ route('admin.home') }}" class="brand-logo center"><i class="material-icons left" >fitness_center</i>Academia Renan´s</a>

                <ul class="right hide-on-med-and-down">               
                    <li>
                        <a href="sass.html"></a>
                    </li>
            
                    <!-- Dropdown Menu -->
                    <li>
                        <a href="{{ route('admin.home') }}" id="nav-name">{{Auth::user()->name}}</a>
                    </li>
                    
                    <li class="dropdown-trigger" data-target="dropdown">
                        <img src="/img/profile_photo_path/{{Auth::user()->profile_photo_path}}" alt="imagem-perfil" id="nav-image" class="circle responsive-img">
                    </li>

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
            <li class="collapsible center">
                <a class="#!">Atalhos</a>
            </li>
            
            <li class="collapsible">
                <a href="{{ route('admin.home') }}" class="waves-effect"> Administração <i class="material-icons" id="nav-title-icon">fitness_center</i> </a>
            </li>
            
            <li class="collapsible">
                <a href="{{ route('students.start') }}" class="waves-effect"> Minha Ficha <i class="material-icons" id="nav-title-icon">library_books</i> </a>
            </li> 

            <li class="collapsible">
                <a href="{{ route('admin.users') }}" class="waves-effect"> Alunos <i class="material-icons" id="nav-title-icon">group</i> </a>
            </li> 

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"> Mensalidades <i class="material-icons">payments</i><i class="material-icons right">arrow_drop_down</i> </a>
                        <div class="collapsible-body light-blue darken-4">
                            <ul>                        
                                <li>
                                    <a href="{{ route('admin.payments.index') }}"> Listar <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>

                                <li class="collapsible"></li>
                                
                                <li>
                                    <a href="{{ route('admin.table.monthlyType') }}"> Tipo Mensalidade <i class="material-icons">radio_button_unchecked</i></a>
                                </li>

                                <li class="collapsible"></li>

                                <li>
                                    <a href="{{ route('admin.payments.report') }}"> Relatório <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
                     
            <li class="no-padding"></li>

            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect">Cadastro <i class="material-icons">folder_copy</i><i class="material-icons right">arrow_drop_down</i> </a>
                    <div class="collapsible-body light-blue darken-4">
                        <ul>
                            <li>
                                <a href="{{ route('admin.user.create') }}"> Aluno <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.register.media') }}"> Mídia <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.register.monthlyType') }}"> Tipo Mensalidade <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.register.exercise') }}"> Exercício <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.register.groupmuscle') }}"> Grupo Muscular <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.register.training') }}"> Divisão de Treino <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"> Listas <i class="material-icons">view_list</i><i class="material-icons right">arrow_drop_down</i> </a>
                        <div class="collapsible-body light-blue darken-4">
                            <ul>
                                <li>
                                    <a href="{{ route('admin.table.monthlyType') }}"> Tipos de Mensalidade <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>

                                <li class="collapsible"></li>

                                <li>
                                    <a href="{{ route('admin.table.media') }}"> Mídias <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>

                                <li class="collapsible"></li>

                                <li>
                                    <a href="{{ route('admin.table.exercise') }}"> Exercícios <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>

                                <li class="collapsible"></li>

                                <li>
                                    <a href="{{ route('admin.table.groupmuscle') }}"> Grupos Musculares <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>
                                
                                <li class="collapsible"></li>
                                
                                <li>
                                    <a href="{{ route('admin.table.training') }}"> Divisões do Treino <i class="material-icons">radio_button_unchecked</i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect">Relatórios <i class="material-icons">summarize</i><i class="material-icons right">arrow_drop_down</i> </a>
                    <div class="collapsible-body light-blue darken-4">
                        <ul>
                            <li>
                                <a href="{{ route('admin.payments.report') }}"> Mensalidade <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>

                            <li class="collapsible"></li>

                            <li>
                                <a href="{{ route('admin.user.report') }}"> Alunos <i class="material-icons">radio_button_unchecked</i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            <li class="collapsible">
                <a href="{{ route('admin.statistic') }}" class="waves-effect"> Estatísticas <i class="material-icons">bar_chart_4_bars</i></a>
            </li>
            
            <li class="collapsible">
                <a href="{{ route('admin.called') }}" class="waves-effect"> Chamados <i class="material-icons">forum</i></a>
            </li>

            <li class="collapsible">
                <a href="{{ route('admin.register.media') }}" class="waves-effect"> Mídias <i class="material-icons">perm_media</i></a>
            </li>
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
                
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 - Renan Aragão 
                <br> Todos os direitos reservados.
                <br> Versão: 2.0.1
            </p>
        </div>
    </footer>

   <!-- Janelas modais -->

  <!-- Add Post Modal -->
    <div id="report-modal" class="modal">
        <div class="modal-content">
            <h4>reportar problema no site</h4>
            <form>
                <div class="input-field">
                    <input type="text" id="title">
                    <label for="title">Titulo</label>
                </div>
                
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>Selecione a opção</option>
                        <option value="Add Recurso">Adicionar recurso</option>
                        <option value="Bug">Pagina apresentando Bug</option>
                        <option value="Ma funcionalidade">Má funcionalidade</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <label>Categoria</label>
                </div>

                <div class="input-field">
                    <textarea name="body" id="body" class="materialize-textarea"></textarea>
                    <label for="body">Body</label>
                </div>
            </form>

            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn light-blue darken-4 left white-text">Reportar</a>
            </div>
        </div>
    </div>

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

      // Dados de exemplo
      let data = {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
        datasets: [{
          label: 'Visitas ao Site',
          data: [500, 800, 650, 900, 700],
          backgroundColor: 'rgba(54, 162, 235, 0.6)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };
  
      // Configurações do gráfico
      let options = {
        responsive: true,
        maintainAspectRatio: false
      };
  
      // Criar o gráfico
      let ctx = document.getElementById('chart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
      });
    </script>
  <!-- Fim das chamadas de Scripts -->
</body>
</html>