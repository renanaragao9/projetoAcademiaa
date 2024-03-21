<?php
    $dataInicio = strtotime($payments[0]->date_payment);
    $dataVencimento = strtotime($payments[0]->date_due_payment);
    $diferenca = $dataVencimento - $dataInicio;
    $diasRestantes = floor($diferenca / (60 * 60 * 24));
?>

@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')
<h2 id="homeUserTitle" class="center">Pagamentos</h2>
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
                                       <p id="text-profile-first" ><i class="material-icons">schedule</i> Faltam {{$diasRestantes}} dias para o vencimento</p> <br> <br>
                                       <p id="text-profile-first" ><i class="material-icons">person</i> Registrado por {{$payments[0]->userCreator->name}}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                <div class="card-action">
                    <div class="row">
                        @if(count($payments) > 0)
                            @foreach ($payments as $payment)
                                <table class="highlight">
                                    <tbody>
                                        <tr>
                                            <td id="text-profile">Plano: <span id="text-profile-span"> {{$payment->monthly->name_monthly}}</span> <br> 
                                                Valor:<span id="text-profile-span"> R$ {{ number_format($payment->value_payment, 2, ',', '.') }} </span> <br> 
                                                Inicio do Plano:<span id="text-profile-span"> {{date( 'd/m/Y' , strtotime($payment->date_payment))}} </span> <br>
                                                Fim do plano:<span id="text-profile-span"> {{date( 'd/m/Y' , strtotime($payment->date_due_payment))}} </span> <br>
                                                Forma de Pagamento:<span id="text-profile-span"> {{$payment->form_payment}} </span> <br>
                                                Registrado por:<span id="text-profile-span"> {{$payment->userCreator->name}} </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <br><span id="profile-subtitle-mobile">Você ainda não possui pagamento:</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de alerta -->
    <div id="modal-alerta" class="modal">
        <div class="modal-content">
            <i class="material-icons" id="modal-icon-alert">info</i>
            <h4>Confirmação</h4>
            <p>Deseja realmente mudar a foto de perfil ?</p>
        </div>

        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
            <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Sim</a>
        </div>
    </div>
    
@endsection

@section('script')
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        let modal = document.getElementById('modal-alerta');
        let instance = M.Modal.init(modal);

        let form = document.querySelector('#form_profile');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            instance.open();
        });

        let cancelBtn = document.querySelector('.modal-footer .modal-close');

        cancelBtn.addEventListener('click', function() {
            instance.close();
        });

        let sendBtn = document.getElementById('sendBtn');

        sendBtn.addEventListener('click', function() {
            form.submit();
        });
    });

        // Referencie os elementos HTML que você adicionou
        const fileInput = document.getElementById('file-input');
        const previewImage = document.getElementById('profile-img-mobile'); // Alterei para usar o mesmo ID da imagem original
        const uploadButton = document.getElementById('upload-button');

        // Adicione um evento de clique ao botão de upload
        uploadButton.addEventListener('click', function () {
            fileInput.click();
        });

        // Adicione um evento de alteração ao input de arquivo
        fileInput.addEventListener('change', function () {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
        
        function addKg(input) {
            const inputValue = input.value;
            const cleanedValue = inputValue.replace(/[^0-9.]/g, ''); // Remove caracteres não numéricos, mantendo apenas números e pontos
            input.value = cleanedValue + ' Kg'; // Adicione 'Kg' ao valor limpo

            // Salvar o valor no localStorage
            localStorage.setItem('weight', cleanedValue);
        }

        function addCm(input) {
            const inputValue = input.value;
            const cleanedValue = inputValue.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos, mantendo apenas números
            input.value = cleanedValue + ' cm'; // Adicione 'cm' ao valor limpo

             // Salvar o valor no localStorage
            localStorage.setItem('height', cleanedValue);
        }

        document.getElementById('calculateButton').addEventListener('click', calculateBMI);

    function calculateBMI() {
        const weightInput = document.getElementById('icon_prefix_weight');
        const heightInput = document.getElementById('icon_prefix_height');
        const resultElement = document.getElementById('result_profile_imc');

        // Recuperar os valores do localStorage
        const savedWeight = localStorage.getItem('weight');
        const savedHeight = localStorage.getItem('height');

        // Usar os valores salvos se existirem
        if (savedWeight) {
            weightInput.value = savedWeight + ' Kg';
        }
        if (savedHeight) {
            heightInput.value = savedHeight + ' cm';
        }

        const weight = parseFloat(weightInput.value);
        const height = parseFloat(heightInput.value);

        if (!isNaN(weight) && !isNaN(height)) {
            const bmi = weight / ((height / 100) ** 2);
                resultElement.innerHTML = `IMC: ${bmi.toFixed(2)} <br><br><a href="https://www.tuasaude.com/imc/" target="_blank">Verifique a tabela do IMC clicando aqui!!</a>`;
        } else {
            resultElement.innerText = 'Preencha peso e altura válidos.';
        }
    }

    </script>
@endsection