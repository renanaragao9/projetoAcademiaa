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
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/israelj.png'))) }}" style="max-width: 100%"  />
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
          <li><strong>Nome:</strong> {{ $student->name }}</li>       
        </ul>
      </td>
      
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li><strong>Data:</strong> {{ \Carbon\Carbon::parse($student->date)->format('d/m/Y') }}</li>
        </ul>
      </td>
    </tr>
  </table>


 
  <table style="border-collapse: collapse; width: 100%;">
    <tr>
        <td colspan="2">
            <h2 style="margin: 0px 0; font-size: 28px;">Avaliação: {{ \Carbon\Carbon::parse($studentAssessment->created_at)->format('d/m/Y') }}</h2>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
      <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
              <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                  <div>
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/goal.png'))) }}" style="width: 50px; height: 50px;"  />
                  </div>
                  <p style="margin: 0; margin-left: 30px;"><strong>Objetivo:</strong> {{ $studentAssessment->goal }}</p>
              </li>
          </ul>
      </td>
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
              <div>
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/stopwatch.png'))) }}" style="width: 50px; height: 50px;"  />
              </div>
              <p style="margin: 0; margin-left: 30px;"><strong>Prazo:</strong> {{ $studentAssessment->term }}</p>
          </li>
      </ul>
      </td>
  </tr>

    <tr style="margin: 2px 0;">
      <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
              <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                  <div>
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/fita-metrica.png'))) }}" style="width: 50px; height: 50px;"  />
                  </div>
                  <p style="margin: 0; margin-left: 30px;"><strong>Altura:</strong> {{ $studentAssessment->height }} cm</p>
              </li>
          </ul>
      </td>
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
              <div>
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/balanca-corporal.png'))) }}" style="width: 50px; height: 50px;"  />
              </div>
              <p style="margin: 0; margin-left: 30px;"><strong>Peso:</strong> {{ $studentAssessment->weight }} Kg</p>
          </li>
      </ul>
      </td>
    </tr>
    
    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                    <div>
                      @if($student->sexo === 'Feminino')
                        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/braco-fem.png'))) }}" style="width: 50px; height: 50px;" />
                      @else
                        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/braco-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                      @endif
                    </div>
                    <p style="margin: 0; margin-left: 30px;"><strong>Braço:</strong> {{ $studentAssessment->arm }} cm</p>
                </li>
            </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/antebraco-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/antebraco-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Antebraço:</strong> {{ $studentAssessment->forearm }} cm</p>
            </li>
          </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/peito-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/peito-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Peitoral:</strong> {{ $studentAssessment->breastplate }} cm</p>
            </li>
          </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/costas-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/costas-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Costas:</strong> {{ $studentAssessment->back }} cm</p>
            </li>
          </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
      <td style="width: 50%; vertical-align: top; text-align: left;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
              <div>
                @if($student->sexo === 'Feminino')
                  <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/coxa-fem.png'))) }}" style="width: 50px; height: 50px;" />
                @else
                  <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/coxa-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                @endif
              </div>
              <p style="margin: 0; margin-left: 30px;"><strong>Coxa:</strong> {{ $studentAssessment->thigh }} cm</p>
          </li>
        </ul>
      </td>

      <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
              <div>
                @if($student->sexo === 'Feminino')
                  <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/cintura-fem.png'))) }}" style="width: 50px; height: 50px;" />
                @else
                  <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/cintura-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                @endif
              </div>
              <p style="margin: 0; margin-left: 30px;"><strong>Cintura:</strong> {{ $studentAssessment->waist }} cm</p>
          </li>
        </ul>
      </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/quadril-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/quadril-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Quadril:</strong> {{ $studentAssessment->hip }} cm</p>
            </li>
          </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/gluteo-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/gluteo-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Glúteo:</strong> {{ $studentAssessment->glute }} cm</p>
            </li>
          </ul>
        </td>
    </tr>

    <tr style="margin: 2px 0;">
        <td style="width: 50%; vertical-align: top; text-align: left; padding-right: 20px;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  @if($student->sexo === 'Feminino')
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/panturrilha-fem.png'))) }}" style="width: 50px; height: 50px;" />
                  @else
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/panturrilha-masc.png'))) }}" style="width: 50px; height: 50px;"  />
                  @endif
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>Panturrilha:</strong> {{ $studentAssessment->calf }} cm</p>
            </li>
          </ul>
        </td>
        <td style="width: 50%; vertical-align: top; text-align: left;">
          <ul style="list-style: none; padding-left: 0; margin: 0;">
            <li style="display: flex; align-items: center; margin-bottom: 10px; color: black;">
                <div>
                  <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_pdf/imc.png'))) }}" style="width: 50px; height: 50px;"/>
                </div>
                <p style="margin: 0; margin-left: 30px;"><strong>IMC:</strong> {{ $imc }}</p>
            </li>
          </ul>
        </td>
    </tr>
    
  </table>

</body>
</html>
