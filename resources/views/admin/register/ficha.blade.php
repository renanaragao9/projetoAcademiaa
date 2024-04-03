@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Cadastro de Ficha')

@section('content')

    <!-- Inicio de conteudo -->
    <div class="row">
        <div class="card white">
            <div class="card-content">
                <div class="row">
                    <form class="col s12" action="{{ route('admin.register.ficha.create') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="input-field col s12 l12" id="input-exercicio">
                                <h3 id="homeTitle" class="center">Cadastrar nova Ficha</h3>
                                <h4 id="homeTitle" class="center">Aluno(a) {{ $user->name }}</h4>
                            </div>

                            <div class="input-field col s12">
                                <h4 class="center">Divisão do Treino</h4>
                            </div>

                            <!-- SELECT TREINO DESKTOP -->
                            <div class="input-field col s12 l6" id="select-treino-desktop">
                                <select name="id_training_fk" id="id_training_fk" class="browser-default" required>
                                    <option value="" disabled selected>Selecione</option>

                                    @foreach ($trainings as $training)
                                        <option value="{{ $training->id_training }}"> {{ $training->name_training }}</option>
                                    @endforeach
                                </select>
                                <label id="labelSpacing" id="labelSpacing"><h11>*</h11> Treino</label>
                            </div>

                            <!-- SELECT ORDEM DESKTOP -->
                            <div class="input-field col s12 l6" id="select-ordem-desktop">
                                <select name="order" id="order" class="browser-default" required>
                                    <option value="" disabled selected>Selecione</option>

                                    @foreach ($numbers as $number)
                                        <option value="{{ $number }}"> {{ $number }}° </option>
                                    @endforeach
                                </select>
                                <label id="labelSpacing"><h11>*</h11> Ordem do exercício</label>
                            </div>
                            
                            <!-- GPM DESKTOP -->
                            <div class="input-field col s12 l6" id="select-gpm-desktop">
                                <select name="id_gmuscle_fk_to_ficha" id="id_gmuscle_fk_to_ficha" class="browser-default" required>
                                    <option value="" disabled selected>Selecione</option>

                                    @foreach ($muscleGroups as $muscleGroup)
                                        <option value="{{ $muscleGroup->id_gmuscle }}"> {{ $muscleGroup->name_gmuscle }}</option>
                                    @endforeach
                                </select>
                                <label id="labelSpacing"><h11>*</h11> Grupo Muscular</label>
                            </div>

                            <div class="input-field col s12 l6">
                                <select name="id_exercise_fk" id="id_exercise_fk" class="browser-default" required>

                                </select>
                                <label id="labelSpacing"><h11>*</h11> Exercício</label>
                            </div>

                            <div class="input-field col s12">
                                <h4 class="center">Especificação do Exercício</h4>
                            </div>

                            <div class="input-field col s12 l6">
                                <input name="serie" id="serie" type="text" class="validate" required>
                                <label id="labelSpacing" for="serie"><h11>*</h11> Série:</label>
                            </div>

                            <div class="input-field col s12 l6">
                                <input name="repetition" id="repetition" type="text" class="validate" required>
                                <label id="labelSpacing" for="repetition"><h11>*</h11> Repetição:</label>
                            </div>

                            <div class="input-field col s12 l6">
                                <input name="weight" id="weight" type="text" class="validate" placeholder="Padrao: Livre">
                                <label id="labelSpacing" for="weight">Peso:</label>
                            </div>

                            <div class="input-field col s12 l6">
                                <input name="rest" id="rest" type="text" class="validate" placeholder="Padrao: 00:30">
                                <label id="labelSpacing" for="rest">Descanso:</label>
                            </div>

                            <div class="input-field col s12 l6" >
                                <input type="hidden" name="id_user_fk" id="id_user_fk" value="{{ $user->id }}">
                                <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                                <input type="hidden" name="id_user_creator_fk" id="id_user_creator_fk" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="input-field col s12">
                                <textarea name="description" id="description" class="materialize-textarea" data-length="250"></textarea>
                                <label id="labelSpacing" for="description">Observação:</label>
                            </div>

                            <div class="input-field col s12 l6 left">
                                <button type="button" id="adicionarDado" class="btn waves-effect waves-light orange darken-4"><i class="material-icons left">add</i>Adicionar Exercício</button>
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
                        
                        <a href="#modal-alerta_2" class="modal-trigger waves-effect waves-light btn left light-blue darken-4 col s12 l5"><i class="material-icons right">save</i>Cadastrar</a>

                        <a href="{{ route('admin.ficha.table-user', $user->id) }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5" id=""><i class="material-icons right">table_rows</i>Listar Fichas do Aluno</a>
                            
                        <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                        
                        <form id="form_ficha_delete" method="post" action="{{ route('admin.ficha.deletefichas', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="right btn waves-effect waves-light  red accent-4 col s12 l5" id="save-button" name="action" onclick="confirmSubmit()"><i class="material-icons left">warning</i> Excluir Todas as Fichas <i class="material-icons right">delete_forever</i></button>
                        </form>                 
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
            <p class="warning-modal">* Essa ação não é reversível * </p>
        </div>

        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
            <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Exluir</a>
        </div>
    </div>

    <!-- 2° Modal de alerta -->
    <div id="modal-alerta_2" class="modal">
        <div class="modal-content center">
            <i class="material-icons" id="modal-icon-alert">info</i>
            <h4>Confirmação de Criação</h4>
            <p>Deseja realmente criar a ficha do aluno {{ $user->name }} ?</p>
        </div>

        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
            <button class="btn waves-effect waves-light light-blue darken-4 left" id="enviarDados" type="button" name="action" onclick="confirmSubmit()">Criar
                <i class="material-icons right">save</i>
            </button>
        </div>
    </div>

  <!-- Fim de conteudo -->
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
                                    text: exercise.name_exercise
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

             /* Função para enviar varios exercicios para a ficha */
            
            let dadosArray = [];
            let id_user_fk_valor = $("#id_user_fk").val();
            let id_user_creator_fk_valor = $("#id_user_creator_fk").val();

            $("#adicionarDado").on("click", function() {
                let id_training_fk = $("#id_training_fk").val();
                let nameTrainingSelected = $("#id_training_fk option:selected").text();
                let order = $("#order").val();
                let id_gmuscle_fk_to_ficha = $("#id_gmuscle_fk_to_ficha").val();
                let id_exercise_fk = $("#id_exercise_fk").val();
                let nameExerciseSelected = $("#id_exercise_fk option:selected").text();
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
                    return;
                }

                // Verifica se a ordem de treino já existe no array
                let orderExists = false;
                for (let i = 0; i < dadosArray.length; i++) {
                    if (dadosArray[i].order === order) {
                        orderExists = true;
                        break;
                    }
                }

                if (orderExists) {
                    alert("Já existe esta ordem de treino. Por favor, modifique.");
                    return;
                }

                adicionarLinha(id_training_fk, id_exercise_fk, order, id_gmuscle_fk_to_ficha, serie,
                    repetition, weight, rest, description, id_user_fk_valor, id_user_creator_fk_valor, nameTrainingSelected, nameExerciseSelected);

                // Limpar apenas os campos que devem ser limpos
                $("#serie, #repetition, #weight, #rest, #description").val("");
            });

            // Função para adicionar uma linha à tabela
            function adicionarLinha(id_training_fk, id_exercise_fk, order, id_gmuscle_fk_to_ficha, serie,
                repetition, weight, rest, description, id_user_fk, id_user_creator_fk, nameTrainingSelected, nameExerciseSelected) {
                let row = $("<tr>");
                row.append("<td>" + nameTrainingSelected + "</td>");
                row.append("<td>" + order + "</td>");
                row.append("<td>" + nameExerciseSelected + "</td>");
                row.append("<td><button class='btn-excluir btn red'>Excluir</button></td>");
                $("#tabelaDados tbody").append(row);
                
                // Puxa os dados da array para o banco de dados
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
                dadosArray.splice(rowIndex, 1);
                $(this).closest("tr").remove();
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
            let form = document.querySelector('#form_ficha_delete');

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

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });

        let larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
        // Define a classe com base na largura da tela
        if (larguraTela > 700) {
            $("#id_training_fk").removeClass("browser-default");
            $("#order").removeClass("browser-default");
            $("#id_gmuscle_fk_to_ficha").removeClass("browser-default");
            $("#id_exercise_fk").removeClass("browser-default");
        }
        
    </script>
@endsection
