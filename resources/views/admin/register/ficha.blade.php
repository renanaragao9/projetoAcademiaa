@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Cadastro de Ficha')

@section('content')

    <!-- Inicio de conteudo -->
    <div class="row">
        <div class="col s12 m12">
            <div class="card white">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12" action="{{ route('admin.register.ficha.create') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="input-field col s12 l12" id="input-exercicio">
                                    <h3 id="titleColor" class="center">Cadastro de Ficha</h3>
                                    <h4 id="titleColor" class="center">Aluno: {{ $user->name }}</h4>
                                </div>

                                <div class="input-field col s12">
                                    <h4 class="center">Divisão do Treino</h4>
                                </div>

                                <div class="input-field col s12 l6">
                                    <select name="id_training_fk" id="id_training_fk" required>
                                        <option value="" disabled selected>Selecione</option>

                                        @foreach ($trainings as $training)
                                            <option value="{{ $training->id_training }}"> {{ $training->name_training }} -> {{$training->id_training}} </option>
                                        @endforeach
                                    </select>
                                    <label>Treino</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <select name="order" id="order" required>
                                        <option value="" disabled selected>Selecione</option>

                                        @foreach ($numbers as $number)
                                            <option value="{{ $number }}"> {{ $number }}° </option>
                                        @endforeach
                                    </select>
                                    <label>Ordem do exercício</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <select name="id_gmuscle_fk_to_ficha" id="id_gmuscle_fk_to_ficha" required>
                                        <option value="" disabled selected>Selecione</option>

                                        @foreach ($muscleGroups as $muscleGroup)
                                            <option value="{{ $muscleGroup->id_gmuscle }}"> {{ $muscleGroup->name_gmuscle }}</option>
                                        @endforeach
                                    </select>
                                    <label>Grupo Muscular</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <select name="id_exercise_fk" id="id_exercise_fk" required>

                                    </select>
                                    <label>Exercício</label>
                                </div>

                                <div class="input-field col s12">
                                    <h4 class="center">Especificação do Exercício</h4>
                                </div>

                                <div class="input-field col s12 l6">
                                    <input name="serie" id="serie" type="number" class="validate" required>
                                    <label for="serie">Série:</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <input name="repetition" id="repetition" type="number" class="validate" required>
                                    <label for="repetition">Repetição:</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <input name="weight" id="weight" type="number" class="validate" placeholder="Livre">
                                    <label for="weight">Peso:</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <input name="rest" id="rest" type="number" class="validate" placeholder="00:30s">
                                    <label for="rest">Descanso:</label>
                                </div>

                                <div class="input-field col s12 l6">
                                    <input type="hidden" name="id_user_fk" id="id_user_fk" value="{{ $user->id }}">
                                    <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                                    <input type="hidden" name="id_user_creator_fk" id="id_user_creator_fk"
                                        value="{{ Auth::user()->id }}">
                                </div>

                                <div class="input-field col s12">
                                    <textarea name="description" id="description" class="materialize-textarea" data-length="250"></textarea>
                                    <label for="description">Observação:</label>
                                </div>

                                <div class="input-field col s12 l6 left">
                                    <button type="button" id="adicionarDado"
                                        class="btn waves-effect waves-light orange darken-4">Adicionar Exercicio</button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Tabela para mostrar os dados adicionados -->
                        <table id="tabelaDados" class="striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Treino</th>
                                    <th>Ordem</th>
                                    <th>Exercicio</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Os dados serão exibidos aqui -->
                            </tbody>
                        </table>

                        <br><br>
                        <hr>

                        <div class="input-field col s12 l12">
                            <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="enviarDados"
                                type="button" name="action" onclick="confirmSubmit()">Cadastrar
                                <i class="material-icons right">save</i>
                            </button>

                            <a href="{{ route('admin.ficha.table-user', $user->id) }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Ficha</a>
                                
                            <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                            
                            <form id="form_group_muscle" method="post" action="{{ route('admin.ficha.deletefichas', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="right btn waves-effect waves-light  red accent-4 col s12 l5" id="save-button" name="action" onclick="confirmSubmit()"><i class="material-icons left">warning</i> Excluir Todas as Fichas <i class="material-icons right">delete_forever</i></button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal de alerta -->
  <div id="modal-alerta" class="modal">
    <div class="modal-content">
        <i class="material-icons" id="modal-icon-alert">info</i>
        <h4>Confirmação de Exclusão</h4>
        <p>Deseja realmente excluir todos os exercícios da ficha de {{ $user->name }} ?</p>
        <p class="warning-modal">* Essa ação não e reversível * </p>
    </div>

    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left"
            id="sendBtn">Exluir</a>
    </div>
  </div>
  <!-- Fim Inicio de conteudo -->
@endsection

@section('script')
    <script>
        
        //Função para popular o select exercicio atraves da escolha do select Grupo Muscular
        $(document).ready(function() {
            $('select').formSelect();

            $('#id_gmuscle_fk_to_ficha').change(function() {
                var muscleGroupId = $(this).val();
                if (muscleGroupId) {
                    $.ajax({
                        url: 'select/' + muscleGroupId,
                        type: 'GET',
                        success: function(data) {
                            $('#id_exercise_fk').empty();
                            $('#id_exercise_fk').append($('<option>', {
                                value: '',
                                text: 'Selecionar'
                            }));
                            $.each(data, function(index, exercise) {
                                $('#id_exercise_fk').append($('<option>', {
                                    value: exercise.id_exercise,
                                    text: exercise.name_exercise + " -> " + exercise.id_exercise
                                }));
                            });

                            $('#id_exercise_fk').formSelect();
                        }
                    });
                } else {
                    $('#id_exercise_fk').empty();
                    $('#id_exercise_fk').formSelect();
                }
            });

        //Função para enviar varios exercicios para a ficha   
            
            // array de dados
            let dadosArray = [];

            // Variáveis para armazenar os valores dos campos id_user_fk e id_user_creator_fk
            let id_user_fk_valor = $("#id_user_fk").val();
            let id_user_creator_fk_valor = $("#id_user_creator_fk").val();

            // Evento de clique no botão "Adicionar Dado"
            $("#adicionarDado").on("click", function() {
                let id_training_fk = $("#id_training_fk").val();
                let order = $("#order").val();
                let id_gmuscle_fk_to_ficha = $("#id_gmuscle_fk_to_ficha").val();
                let id_exercise_fk = $("#id_exercise_fk").val();
                let serie = $("#serie").val();
                let repetition = $("#repetition").val();
                let weight = $("#weight").val();
                let rest = $("#rest").val();
                let description = $("#description").val();

                if (
                    id_training_fk === "" ||
                    id_gmuscle_fk_to_ficha === "" ||
                    id_exercise_fk === "" ||
                    serie === "" ||
                    repetition === ""
                ) {
                    alert("Por favor, preencha todos os campos obrigatórios.");
                    return; // Impede a execução adicional se campos obrigatórios estiverem vazios
                }

                console.log(description); // Usando o valor armazenado
                console.log(id_user_creator_fk_valor); // Usando o valor armazenado

                adicionarLinha(id_training_fk, id_exercise_fk, order, id_gmuscle_fk_to_ficha, serie,
                    repetition, weight, rest, description, id_user_fk_valor, id_user_creator_fk_valor);

                // Limpar apenas os campos que devem ser limpos
                $("#serie, #repetition, #weight, #rest, #description").val("");
            });

            // Função para adicionar uma linha à tabela
            function adicionarLinha(id_training_fk, id_exercise_fk, order, id_gmuscle_fk_to_ficha, serie,
                repetition, weight, rest, description, id_user_fk, id_user_creator_fk) {
                let row = $("<tr>");
                row.append("<td>" + id_training_fk + "</td>");
                row.append("<td>" + order + "</td>");
                row.append("<td>" + id_exercise_fk + "</td>");
                row.append("<td><button class='btn-excluir btn red'>Excluir</button></td>");
                $("#tabelaDados tbody").append(row);

                dadosArray.push({
                    id_training_fk: id_training_fk,
                    id_exercise_fk: id_exercise_fk,
                    order: order,
                    id_gmuscle_fk_to_ficha: id_gmuscle_fk_to_ficha,
                    serie: serie,
                    repetition: repetition,
                    weight: weight,
                    rest: rest,
                    description: description,
                    id_user_fk: id_user_fk,
                    id_user_creator_fk: id_user_creator_fk
                });
            }

            // Evento de clique no botão "Excluir" em uma linha da tabela
            $("#tabelaDados").on("click", ".btn-excluir", function() {
                let rowIndex = $(this).closest("tr").index();
                dadosArray.splice(rowIndex, 1); // Remove o item do array
                $(this).closest("tr").remove(); // Remove a linha da tabela
            });

            // Evento de clique no botão "Enviar Dados para o Laravel"
            $("#enviarDados").on("click", function() {
                // Obtenha o token CSRF da meta tag
                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                console.log(dadosArray)

                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.register.ficha.create') }}",
                    data: {
                        dados: dadosArray
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Inclusão do token CSRF Laravel
                    },
                    success: function(response) {
                        window.location.href = "{{ route('redirect.success') }}";
                    },
                    error: function(error) {
                        // console.error(error);
                        window.location.href = "{{ route('redirect.error') }}";
                    }
                });
            });
        });

        //Função para abrir a tela modal

        document.addEventListener('DOMContentLoaded', function() {
            let modal = document.getElementById('modal-alerta');
            let instance = M.Modal.init(modal);

            let form = document.querySelector('#form_group_muscle');

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
    </script>
@endsection
