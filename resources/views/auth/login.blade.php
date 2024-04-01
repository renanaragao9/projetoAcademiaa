
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Icones e Fontes -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    
    <!-- Estilo -->
    <link rel="stylesheet" href="css/style_login.css" />
    
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <!-- Primeira parte (TELA DE LOGIN) -->

          <form action="{{ route('login') }}" method="POST" class="sign-in-form">
            @csrf
            
            <h1  id="title-name">Personal Trainer</h1>
            <h1  id="title-name">Israel Dantas</h1>  
            
            @if (session('status'))
              <div class="custom-message success">
                <p>Senha redefinida com sucesso!</p>
              </div>
            @endif
        
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="email" type="email" placeholder="Email" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Senha" required/>
            </div>

            <x-input-error :messages="$errors->get('email')" class="flash-message-login" />
            @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                  {{ __('Esqueceu a senha ?') }}
              </a>
            @endif

            <input type="submit" value="Entrar" class="btn solid" />
            
            <p class="social-text">Conheça nossas redes sociais</p>

            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook"></i>
              </a>

              <a href="https://www.instagram.com/israeltrainingg/" target="blank" class="social-icon">
                <i class="fab fa-instagram"></i>
              </a>

              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>

              <a href="https://api.whatsapp.com/send?phone=5585988718063" target="blank" class="social-icon">
                <i class="fab fa-whatsapp"></i>
              </a>

            </div>
          </form>

          <!-- Segunda parte (TELA DE CADASTRO) -->
          <form class="sign-up-form" method="POST" action="{{ route('admin.createCount.store') }}">
          @csrf
            
            <h2 class="title">Solicitar Acesso</h2>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="nome" type="text" placeholder="Nome" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="email" type="email" placeholder="Email" />
            </div>
            
            <input type="submit" value="Solicitar" class="btn solid" />
            
            <p class="social-text">Conheceça nossas redes sociais</p>
            
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook"></i>
              </a>
              
              <a href="https://www.instagram.com/israeltrainingg/" target="blank" class="social-icon">
                <i class="fab fa-instagram"></i>
              </a>
              
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              
              <a href="https://api.whatsapp.com/send?phone=5585988718063" target="blank" class="social-icon">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Solicitação de ACESSO-->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Não tem acesso ?</h3>
            <p>
              Solicite acesso atraves do seu personal clicando aqui
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Solicitar acesso
            </button>
          </div>
          <img src="img/Gym-pana.svg" class="image" alt="" />
        </div>


        <div class="panel right-panel">
          <div class="content">
            <h3>Já possui acesso ?</h3>
            <p>
              Clique aqui para entrar no sistema
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Entrar
            </button>
          </div>
          <img src="img/Gym-pana.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <footer style="text-align: center">
        <p>Desenvolvido por: <strong>Renan Aragão</strong></p>
    </footer>

    <script src="js/login.js"></script>
  </body>

  <!--API WhatsAppp Script-->
<script>
  let phone = document.getElementById('phone')
  let message = document.getElementById('message')
  let message2 = document.getElementById('message2')

// buttons
let linkHandler = document.getElementById('by-link')
let popUpHandler = document.getElementById('by-popup')

// font:
let isMobile = (function(a) {
  if ( /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)) ) {
      return true
  } else {
      return false
  }
})(navigator.userAgent || navigator.vendor || window.opera)

const makeLink = function(mode) {

  let mount = function() {
      if ( isMobile ) {
          let target = `whatsapp://send?`

              target += `phone=5585988718063&`

          if ( !!message && message.value !== '' ) {
            target += `text= Olá, Eu ${encodeURIComponent(message.value)}, %0a com o email: ${encodeURIComponent(message2.value)}. %0a Venho através desse formulário informar que não estou conseguindo ter acesso ao sistema de fichas.`
          }
          return target
      } else {
          let target = `https://api.whatsapp.com/send?`

              target += `phone=5585988718063&`

          if ( !!message && message.value !== '' ) {
            target += `text= Olá, Eu ${encodeURIComponent(message.value)}, %0a com o email: ${encodeURIComponent(message2.value)}. %0a Venho através desse formulário informar que não estou conseguindo ter acesso ao sistema de fichas.`
          }
          return target
      }

  }

  let openLink = function() {
      $('#console-container').append(`<span class="col px-0"><b>Link</b>: ${mount()}</span><br><br>`)
      const win = window.open(mount(), '_blank')

  }

  let openPopUp = function() {
      let h = 650,
          w = 550,
          l = Math.floor(((screen.availWidth || 1024) - w) / 2),
          t = Math.floor(((screen.availHeight || 700) - h) / 2)
      // open popup
      let options = `height=600,width=550,top=${t},left=${l},location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=0`
      $('#console-container').append(`<span class="col px-0"><b>PopUp URL</b>: ${mount()}</span><br><span class="col px-0"><b>PopUp options</b>: ${options}</span><br><br>`)
  }

  switch (mode) {
      case 'link':
          openLink()
      break
      case 'popup':
          openPopUp()
      break
  }
}




// events handler(s)
linkHandler.addEventListener('click', function(e) {
  makeLink('link')
}, false)
popUpHandler.addEventListener('click', function(e) {
  makeLink('popup')
}, false
)
</script>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  </body>
</html>
