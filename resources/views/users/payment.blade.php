<?php
    $dataAtual = strtotime(date('Y-m-d'));

    $dataVencimento = strtotime($payments[0]->date_due_payment);

    $diferencaSegundos = $dataVencimento - $dataAtual;

    $diasRestantes = floor($diferencaSegundos / (60 * 60 * 24));

    $mensagem = "";

    if ($diferencaSegundos < 0) {
        $mensagem = "A data de vencimento já passou.";
    } elseif ($diferencaSegundos == 0) {
        $mensagem = "A data de vencimento é hoje.";
    } else {
        $mensagem = "Faltam " . $diasRestantes . " dias para o vencimento.";
    }
?>


@extends('layouts.users')

@section('title', 'Planos')

@section('content')

<div class="container">
    <div class="row">
        <div class="card" id="card-tile-mobile">
            <div class="row">
                <div class="col s12 l10">
                    <i class="material-icons" id="homeUserTitle-icon">payments</i>
                    <h3 id="homeUserTitle" class="center"> Planos</h3>
                </div>
            </div>
        </div>
        @if(count($payments) > 0)
            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-action">
                            <div class="row">
                                <table class="highlight">
                                    <tbody>
                                        <tr>
                                            <td>
                                            <p id="text-profile-first" ><i class="material-icons">payments</i> Plano: {{ $payments[0]->monthly->name_monthly }}</p>
                                            <p id="text-profile-first" ><i class="material-icons">paid</i> Valor: {{ number_format($payments[0]->value_payment, 2, ',', '.') }}</p>
                                            <p id="text-profile-first" ><i class="material-icons">local_atm</i> Pago no {{ $payments[0]->form_payment }}</p>
                                            <p id="text-profile-first" ><i class="material-icons">calendar_month</i> Início  {{date( 'd/m/Y' , strtotime($payments[0]->date_payment))}}</p>
                                            <p id="text-profile-first" ><i class="material-icons">calendar_month</i> Fim  {{date( 'd/m/Y' , strtotime($payments[0]->date_due_payment))}}</p>
                                            <p id="text-profile-first" ><i class="material-icons">schedule</i> {{ $mensagem }} </p> <br> <br>
                                            <p id="text-profile-first" ><i class="material-icons">person</i> Registrado por {{$payments[0]->userCreator->name}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="center">
                                <a href="{{route('receiptDownload', $payments[0]->id_payment)}}" class="btn-small waves-effect waves-light deep-orange accent-3">Baixar Recibo <i class="material-icons right">download</i> </a>
                            </div>
                        </div>

                        <div class="card-action">
                            <div class="row">
                                
                                <p id="payments-historic">Historico de Pagamentos</p>
                                
                                @foreach ($payments as $payment)
                                    <table class="highlight">
                                        <tbody>
                                            <tr>
                                                <td id="text-profile">Plano: <br> <span id="text-profile-span">-> {{$payment->monthly->name_monthly}}</span> <br> 
                                                    Valor: <br> <span id="text-profile-span"> -> R$ {{ number_format($payment->value_payment, 2, ',', '.') }} </span> <br> 
                                                    Inicio do Plano: <br> <span id="text-profile-span"> -> {{date( 'd/m/Y' , strtotime($payment->date_payment))}} </span> <br>
                                                    Fim do plano: <br> <span id="text-profile-span"> -> {{date( 'd/m/Y' , strtotime($payment->date_due_payment))}} </span> <br>
                                                    Forma de Pagamento: <br> <span id="text-profile-span"> -> {{$payment->form_payment}} </span> <br>
                                                    Registrado por: <br> <span id="text-profile-span"> -> {{$payment->userCreator->name}} </span> <br>
                                                    <a href="{{route('receiptDownload', $payment->id_payment)}}" class="btn-small waves-effect waves-light deep-orange accent-3">Baixar Recibo <i class="material-icons right">download</i> </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <br><span id="profile-subtitle-mobile">Você ainda não possui pagamentos:</span>
        @endif
    </div>
</div>
@endsection