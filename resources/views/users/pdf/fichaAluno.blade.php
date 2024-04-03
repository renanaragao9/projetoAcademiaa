<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ficha Renan</title>
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(245, 245, 245, 0.7);
      background-image: url('data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/23266697.jpg'))) }}');
      background-size: cover;
    }

    img {
      height: 150px;
      width: 600px;
      object-fit: cover;
    }

    h1 {
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 28px;
    }

    h3 {
      margin-bottom: 20px;
      text-align: center;
      font-size: 28px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      font-size: 16px;
      display: inline;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8);
    }

    th,
    td {
      border: 1px solid #000;
      padding: 12px;
      font-size: 16px;
      background-color: rgba(255, 255, 255, 0.8);
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
      mar
    }
    
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet" style="height: 10px">
</head>

<body>
  
  <table style="width: 100%; text-align: center;">
    <tr style=" ">
      <td colspan="2">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/logo_sistema_final.png'))) }}" style="width: 100px; height: 100px"/>
      </td>
    </tr>
   
    <tr>
      <td colspan="2">
        <h2 style="margin: 0px 0; font-size: 28px;">Dados Pessoais</h2>
      </td>
    </tr>
    
    <tr style="margin: 2px 0;">
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li><strong>Nome:</strong> {{ $fichaNome->name }};</li>     
          <br><li><strong>Data:</strong> {{  \Carbon\Carbon::parse($fichaNome->date)->format('d/m/Y') }};</li>  
        </ul>
      </td>
      
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li><strong>Peso:</strong> {{ isset($assessment->weight) ? $assessment->weight : '-' }}kg;</li>
          <li><strong>Altura:</strong> {{ isset($assessment->height) ? $assessment->height : '-' }}m;</li>
          <br><li><strong>Objetivo:</strong> {{ isset($assessment->goal) ? $assessment->goal : '-' }};</li>
        </ul>
      </td>
    </tr>
  </table>


  <table style="width: 100%; text-align: center;">
    <tr>
      <td style="text-align: center;">
        <div style="text-align: left;">
          <h3 style="margin: 2px 0;">Ficha: {{ $fichaNome->name_training }}</h3>
          <table>
            <thead>
              <tr>
                <th>Exercício</th>
                <th>Repetições</th>
                <th>Séries</th>
                <th>Carga</th>
                <th>Descanso</th>
                <th>Observação</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($studentFichas as $studentFicha)
                <tr>
                  <td><strong>{{ $studentFicha->name_exercise }}</strong></td>
                  <td>{{ $studentFicha->serie }}x</td>
                  <td>{{ $studentFicha->repetition }}</td>
                  <td>{{ isset($studentFicha->rest) ? $studentFicha->rest : 'Livre' }}</td>
                  <td>{{ isset($studentFicha->rest) ? $studentFicha->rest : '00:30' }}</td>
                  <td>{{ isset($studentFicha->description) ? $studentFicha->description : 'Nenhuma' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
