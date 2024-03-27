<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatorio Mensalidade</title>
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(245, 245, 245, 0.7);
     /*background-image: url('data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/23266697.jpg'))) }}');*/
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
      padding: 2px;
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
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/logo_sistema_prev.png'))) }}" style="width: 420px; height: 90px"/>
      </td>
    </tr>
   
    <tr>
      <td colspan="2">
        <h2 style="margin: 0px 0; font-size: 28px;">Relatório Mensalidades</h2> <br>
        @if($dataReport['period'] == 'Mês')
            <li> <strong style="font-size: 22px;">Mês: {{ \Carbon\Carbon::parse($dataReport['date_monthly'])->locale('pt_BR')->isoFormat('MMMM [de] YYYY') }}</strong> </li>  
          @else
            <li><strong style="font-size: 22px;">Período: {{date( 'd/m/Y' , strtotime($dataReport['date_interval1']))}} a  {{date( 'd/m/Y' , strtotime($dataReport['date_interval2']))}} </strong></li>  
          @endif
      </td>
    </tr>
    
    <tr style="margin: 2px 0;">
      <td style="width: 50%; vertical-align: top; text-align: center;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <li> <strong style="font-size: 22px;">Registros: {{ count($dataPayments) }}</strong> </li>  
        </ul>
      </td>

      <td style="width: 50%; vertical-align: top; text-align: center;">
        <ul style="list-style: none; padding-left: 0; margin: 0;">
          <?php 
            $total = 0;
            foreach ($dataPayments as $payment) {
              $total += $payment->value_payment;
            }
          ?>
            <li> <strong style="font-size: 22px;">Total: R$ {{ number_format($total, 2, ',', '.') }}</strong> </li>  
        </ul>
      </td>
    </tr>
  </table>


  <table>
    <tr>
      <td style="text-align: center;">
        <div style="text-align: left;">
          <h3 style="margin: 2px 0;">Dados </h3>
          <table>
            <thead>
              <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Forma de Pagamento</th>
                <th>Vencimento</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($dataPayments as $payment)
                <tr>
                  <td> {{date( 'd/m/Y' , strtotime($payment->date_payment))}}</td>
                  <td> R$ {{ number_format($payment->value_payment, 2, ',', '.') }}</td>
                  <td> {{ $payment->form_payment }}</td>
                  <td> {{date( 'd/m/Y' , strtotime($payment->date_due_payment))}}</td>
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