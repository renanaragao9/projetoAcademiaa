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
        input.value = input.value.replace(/[^0-9.,]/g,'');

        localStorage.setItem('weight', input.value);
    }

    function addCm(input) {
        input.value = input.value.replace(/[^0-9]/g,'');

        localStorage.setItem('height', input.value);
    }

    document.getElementById('calculateButton').addEventListener('click', calculateBMI);

    function calculateBMI() {
        const weightInput = document.getElementById('icon_prefix_weight');
        const heightInput = document.getElementById('icon_prefix_height');
        const resultElement = document.getElementById('result_profile_imc');
    
        // Recuperar os valores do localStorage
        const savedWeight = localStorage.getItem('weight');
        const savedHeight = localStorage.getItem('height');
        const savedBMI = localStorage.getItem('bmi');
        const savedSituation = localStorage.getItem('situation');
    
        // Usar os valores salvos se existirem
        if (savedWeight) {
            weightInput.value = savedWeight;
        }
        if (savedHeight) {
            heightInput.value = savedHeight;
        }
        if (savedBMI && savedSituation) {
            resultElement.innerHTML = `IMC: ${savedBMI} <br> Situação: ${savedSituation} <br><br><a href="https://www.tuasaude.com/imc/" target="_blank">Verifique a tabela do IMC clicando aqui</a>`;
        }
    
        const weight = parseFloat(weightInput.value);
        const height = parseFloat(heightInput.value);
    
        if (!isNaN(weight) && !isNaN(height)) {
            const bmi = weight / ((height / 100) ** 2);
            const situation = calculateSituation(bmi);
    
            // Salvar os valores no localStorage
            localStorage.setItem('weight', weight);
            localStorage.setItem('height', height);
            localStorage.setItem('bmi', bmi.toFixed(2));
            localStorage.setItem('situation', situation);
    
            resultElement.innerHTML = `IMC: ${bmi.toFixed(2)} <br> Situação: ${situation} <br><br><a href="https://www.tuasaude.com/imc/" target="_blank">Verifique a tabela do IMC clicando aqui</a>`;
        } else {
            resultElement.innerText = 'Preencha peso e altura válidos.';
        }
    }
    
    function calculateSituation(imc) {
        if (imc < 18.5) {
            return "Abaixo do peso";
        } else if (imc >= 18.5 && imc <= 24.9) {
            return "Peso normal";
        } else if (imc >= 25 && imc <= 29.9) {
            return "Sobrepeso";
        } else if (imc >= 30 && imc <= 34.9) {
            return "Obesidade grau 1";
        } else if (imc >= 35 && imc <= 39.9) {
            return "Obesidade grau 2";
        } else {
            return "Obesidade grau 3";
        }
    }
    
    // Chame a função ao carregar a página
    calculateBMI();
    