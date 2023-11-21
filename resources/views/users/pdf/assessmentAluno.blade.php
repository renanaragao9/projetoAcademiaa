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
    }
    
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet" style="height: 10px">
</head>

<body>
  
  <table style="width: 100%; text-align: center;">
    <tr style=" ">
      <td colspan="2">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/israelj.png'))) }}" style="max-width: 100%;" />
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
          <li><strong>Nome:</strong> {{ $fullName }}</li>       
        </ul>
      </td>
      
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li><strong>Peso:</strong> {{ $studentAssessment->weight }}kg;</li>
          <li><strong>Altura:</strong> {{ $studentAssessment->height }}cm</li>
        </ul>
      </td>
    </tr>
  </table>


 
  <table style="border-collapse: collapse; width: 100%;">
    <tr>
        <td colspan="2">
            <h2 style="margin: 0px 0; font-size: 28px;">Avaliação: 24/12/1999</h2>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <p style="margin: 0px 0; font-size: 20px;">Objetivo: <strong>{{ $studentAssessment->goal }}</strong></p>
        </td>
    </tr>
    
    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                    <div>
                      
                    </div>
                    <p style="margin: 0; margin-left: 30px;"><strong>Braço:</strong> {{ $studentAssessment->arm }} cm</p>
                </li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Antebraço:</strong> {{ $studentAssessment->forearm }}cm</li>
            </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Peitoral:</strong> {{ $studentAssessment->breastplate }}cm</li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Costas:</strong> {{ $studentAssessment->back }}cm</li>
            </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Cintura:</strong> {{ $studentAssessment->waist }}cm</li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Glúteo:</strong> {{ $studentAssessment->glute }}cm</li>
            </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Quadril:</strong> {{ $studentAssessment->hip }}cm</li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Coxa:</strong> {{ $studentAssessment->thigh }}cm</li>
            </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>Panturrilha:</strong> {{ $studentAssessment->calf }}cm</li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li><strong>IMC:</strong> {{ $imc }}</li>
            </ul>
        </td>
    </tr>
    
  </table>

</body>
</html>
