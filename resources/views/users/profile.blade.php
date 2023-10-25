@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                   <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-image">
                            <!-- Imagem de perfil -->
                            <div class="image-container">
                                <div class="image-preview">
                                    <img src="/img/renan.jpeg" class="circle responsive-img materialboxed" id="profile-img-mobile" alt="Imagem de Perfil">
                                </div>
                                
                                <input type="file" id="file-input" style="display: none">
                                <a class="btn-floating halfway-fab waves-effect waves-light red" id="upload-button">
                                    <i class="material-icons">compare_arrows</i>
                                </a>
                            </div>
                        </div>
                    
                        <div class="card-content">
                            <span class="card-title center" id="profile-title-mobile">{{ $userProfile->name }}</span>
                            <span id="profile-subtitle-mobile">Email:</span>
                            <p id="profile-text-mobile">{{ $userProfile->email }}</p>
                            <span id="profile-subtitle-mobile">Data de Nascimento:</span>
                            <p id="profile-text-mobile">{{ $userProfile->date }}</p>
                            <span id="profile-subtitle-mobile">Sexo:</span>
                            <p id="profile-text-mobile">{{ $userProfile->sexo }}</p>
                            <span id="profile-subtitle-mobile">Telefone:</span>
                            <p id="profile-text-mobile">{{ $userProfile->phone }}</p>
                        </div>

                        <div class="card-action">
                            <div class="row">
                                
                                <span class="card-title center" id="profile-title-mobile">Calculadora Corporal</span>
                                
                                <div class="input-field col s12" id="inputField">
                                    <i class="material-icons prefix">monitor_weight</i>
                                    <input name="profile_kg" id="icon_prefix_weight" type="text" class="validate" value="80.00" oninput="addKg(this)">
                                    <label for="icon_prefix">Peso</label>
                                </div>
                                
                                <div class="input-field col s12" id="inputField">
                                    <i class="material-icons prefix">height</i>
                                    <input name="profile_alt" id="icon_prefix_height" type="text" class="validate" value="80.00" oninput="addCm(this)">
                                    <label for="icon_prefix">Altura</label>
                                </div>

                                <div class="center">
                                    <a class="center waves-effect waves-light btn" id="calculateButton">Calcular</a>
                                </div>

                                <p id="result"></p>
                            </div>
                        </div>

                        <div class="card-action">
                            <div class="row">
                                <span class="card-title center" id="profile-title-mobile">Fichas</span>
                                @if(count($fichas) > 0)
                                    @foreach ($fichas as $ficha)
                                        <p id="profile-text-mobile">{{ $ficha->name_training }}</p>
                                        <span id="profile-subtitle-mobile">Cocluídas: 5 Vezes</span>
                                    @endforeach
                                @else
                                    <span id="profile-subtitle-mobile">Você ainda não possui ficha:</span>
                                @endif
                            </div>
                        </div>

                        <div class="card-action">
                            <div class="row">
                                <span class="card-title center" id="profile-title-mobile">Avaliações</span>
                                @if(count($fichas) > 0)
                                    @foreach ($fichas as $ficha)
                                        <p id="profile-text-mobile">{{ $ficha->name_training }}</p>
                                        <span id="profile-subtitle-mobile">Cocluídas: 5 Vezes</span>
                                    @endforeach
                                @else
                                    <span id="profile-subtitle-mobile">Você ainda não possui ficha:</span>
                                @endif
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')
    <script>
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
        }

        function addCm(input) {
            const inputValue = input.value;
            const cleanedValue = inputValue.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos, mantendo apenas números
            input.value = cleanedValue + ' cm'; // Adicione 'cm' ao valor limpo
        }

        document.getElementById('calculateButton').addEventListener('click', calculateBMI);

        function calculateBMI() {
            const weightInput = document.getElementById('icon_prefix_weight');
            const heightInput = document.getElementById('icon_prefix_height');
            const resultElement = document.getElementById('result');

            const weight = parseFloat(weightInput.value);
            const height = parseFloat(heightInput.value);

            if (!isNaN(weight) && !isNaN(height)) {
                const bmi = weight / ((height / 100) ** 2);
                const bodyFatIndex = 1.2 * bmi + 0.23 * age - 10.8 * 1 - 5.4;
                resultElement.innerText = `IMC: ${bmi.toFixed(2)}\nÍndice de Gordura: ${bodyFatIndex.toFixed(2)}`;
            } else {
                resultElement.innerText = 'Preencha peso e altura válidos.';
            }
        }

    </script>
@endsection