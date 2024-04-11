<?php
// Array associativo com os nomes dos meses em português
$meses = array(
    'January' => 'janeiro',
    'February' => 'fevereiro',
    'March' => 'março',
    'April' => 'abril',
    'May' => 'maio',
    'June' => 'junho',
    'July' => 'julho',
    'August' => 'agosto',
    'September' => 'setembro',
    'October' => 'outubro',
    'November' => 'novembro',
    'December' => 'dezembro'
);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recibo de Pagamento - Academia Renan's</title>
</head>
<body style="font-family: Arial, sans-serif;">
<div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 2px solid #ccc; background-color: #f9f9f9;">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/logo_sistema_final.png'))) }}" style="width: 200px; height: 150px"/>
    </div>
    <h2 style="text-align: center; margin-bottom: 20px;">Recibo de Pagamento</h2>
    <div style="margin-bottom: 20px;">
        <div style="display: inline-block; width: 50%;">Nome do Aluno: {{ $studentPayment->user->name }}</div>
        <div style="display: inline-block; width: 50%;">Data: <?php echo date('d/m/Y'); ?></div>
    </div>
    <div style="margin-bottom: 20px;">
        <div style="display: inline-block; width: 50%;">Plano: {{ $studentPayment->monthly->name_monthly }}</div>
        <div style="display: inline-block; width: 50%;">Valor: {{ 'R$ ' . number_format($studentPayment->value_payment, 2, ',', '.') }}</div>
    </div>
    <div style="margin-bottom: 20px;">
        <div style="display: inline-block;">Período:
            {{ date('d', strtotime($studentPayment->date_payment)) }} de {{ $meses[date('F', strtotime($studentPayment->date_payment))] }} de {{ date('Y', strtotime($studentPayment->date_payment)) }} à 
            {{ date('d', strtotime($studentPayment->date_due_payment)) }} de {{ $meses[date('F', strtotime($studentPayment->date_due_payment))] }} de {{ date('Y', strtotime($studentPayment->date_due_payment)) }}</div>
        <div style="display: inline-block; width: 50%;">Método de Pagamento: {{ $studentPayment->form_payment }}</div>
    </div>
    <div style="margin-bottom: 20px;">
      <div style="display: inline-block; width: 50%;">Funcionário: {{ $studentPayment->userCreator->name }}</div>
      <div style="display: inline-block; width: 50%;">Observação: {{ $studentPayment->observation ? $studentPayment->observation : 'Nenhuma' }}</div>
    </div>
    <hr style="border: 0; border-top: 1px solid #ccc; margin-bottom: 20px;">
    <div style="text-align: right;">
        Total:{{ 'R$ ' . number_format($studentPayment->value_payment, 2, ',', '.') }}
    </div>
    <div style="margin-top: 30px; text-align: center;">
        <p style="font-size: 12px; color: #666;">Este recibo é válido como comprovante de pagamento. Guarde-o para futuras consultas.</p>
        <p style="font-size: 12px; color: #666;">Academia Renan´s - Rua Pereiro 4785, Fortaleza, Ceará - Tel: (85) 98417-4827</p>
    </div>
</div>
</body>
</html>
