
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redefinir Senha</title>
  
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  
  <!-- Estilos personalizados -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <style>
    body {
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #f1f8e9;
      height: 100%;
    }

    #card-form {
        height: 100%;
    }

    #logo {
        margin-top: -10px;
        margin-bottom: 20px;
        width: 150px;
        height: 150px;
    }

    #title {
        margin-top: -20px;
        margin-bottom: -30px;
    }

    #reset-form {
      max-width: 400px;
      width: 90%;
    }

    #show_password_1, #show_password_2 {
        margin-left: 85%;
        color: #424242;
    }

    footer {
      margin-top: 20px;
      font-size: 12px;
    }
  </style>
</head>
<body>

    <main>
        <div class="container">
            <div class="row" id="reset-form">
                <div class="card z-depth-5" id="card-form">
                    <header class="card-content center-align">
                        <img src="/img/logo_sistema_final.png" class="image-responsive" id="logo" alt="Logo">
                        <h4 id="title">Redefinir Senha</h4>
                    </header>
                    
                    <form id="form_password" method="POST" action="{{ route('password.store') }}">
                    @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        
                        <div class="card-content">
                            <div class="row">
                                
                                <div style="display: none">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="input-field">
                                    <input id="password" type="password" name="password" class="validate" required>
                                    <span class="helper-text" ></span>
                                    <label for="password">Senha</label>
                                    <i class="material-icons prefix" id="show_password_1" style="cursor: pointer;">visibility_off</i>
                                </div>
                            
                                <div class="input-field">
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="validate" required>
                                    <span class="helper-text"></span>
                                    <label for="password_confirmation">Confirme a Senha</label>
                                    <i class="material-icons prefix" id="show_password_2" style="cursor: pointer;">visibility_off</i>
                                </div>
                            </div>
                        </div>
                            
                        <div class="card-action center-align"> 
                            <button class="btn waves-effect waves-light grey darken-3" type="submit" name="action">Enviar Email
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                    
                    <footer class="card-content center-align">
                        © 2024 Todos os direitos reservados
                    </footer>
                </div>
            </div>
        </div>
    </main>

  <!-- Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const showPassword1 = document.getElementById('show_password_1');
      const showPassword2 = document.getElementById('show_password_2');
      const passwordInput1 = document.getElementById('password');
      const passwordInput2 = document.getElementById('password_confirmation');

      showPassword1.addEventListener('click', function() {
        if (passwordInput1.type === 'password') {
          passwordInput1.type = 'text';
          showPassword1.textContent = 'visibility';
        } else {
          passwordInput1.type = 'password';
          showPassword1.textContent = 'visibility_off';
        }
      });

      showPassword2.addEventListener('click', function() {
        if (passwordInput2.type === 'password') {
          passwordInput2.type = 'text';
          showPassword2.textContent = 'visibility';
        } else {
          passwordInput2.type = 'password';
          showPassword2.textContent = 'visibility_off';
        }
      });
    });
  </script>
</body>
</html>
