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
        height: 100%
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
          <form id="form_password" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-content">
              <div class="input-field">
                <input id="email" type="email" name="email" class="validate" required autofocus>
                <span class="helper-text" data-error="Email Inválido"></span>
                <label for="email">Email</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                @if(session('status'))
                    <div class="card-panel green lighten-2">
                       <p> {{ session('status') }}</p>
                    </div>
                @endif
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
</body>
</html>
