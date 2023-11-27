<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Não Encontrada</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    body {
      background-color: #1f1f1f;
      color: #fff;
    }
    .error-container {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    .error-container img {
      width: 70%;
      max-width: 500px;
      margin-bottom: -50px;
    }
  </style>
</head>
<body>
  <div class="error-container">
    <img src="/img/403-error.png" alt="Imagem de erro">
    <h1>Acesso Negado!</h1>
    <p>A página pode ser acessada somente por professores ou administradores.</p>
    <a href="/alunos/inicio" class="btn waves-effect waves-light blue accent-4">Voltar para a Página Inicial</a>
  </div>

  <!-- Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
