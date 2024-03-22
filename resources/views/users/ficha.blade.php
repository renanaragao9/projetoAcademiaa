@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

    <div class="container">
        <div class="card" id="card-tile-mobile">
            <div class="row">
                <div class="col s12 l12">
                    <i class="material-icons" id="homeUserTitle-icon">fitness_center</i>
                    <h3 id="homeUserTitle" class="center"> Ficha de Treino <br>{{ $fichaNome->name_training }} </h3>
                </div>
            </div>
        </div>
          
        @foreach ($studentFichas as $index => $studentFicha)
            <!-- INICIO DA CARD -->
            <div class="row">
                <div class="col s12 m7">
                    <div class="card" id="card-{{ $index }}">
                        <div class="card-image">
                            <img class="materialboxed" id="image-ficha" src="/img/exercise/{{ $studentFicha->image_exercise }}">
                            <a class="modal-trigger btn-floating halfway-fab waves-effect waves-light red" href="#modal{{$index}}"><i class="material-icons">movie</i></a>
                        </div>
                        
                        <div class="card-content z-depth-1">
                            
                            <span class="card-title" id="card-title">{{ $studentFicha->name_exercise }}</span>
                            <table class="highlight">
                                <tbody>
                                    <tr>
                                        <td id="text-ficha">Serie:</td>
                                        <td id="text-dados-ficha">{{ $studentFicha->serie }}x</td>
                                    </tr>
                                    
                                    <tr>
                                        <td id="text-ficha">Repetição:</td>
                                        <td id="text-dados-ficha">{{ $studentFicha->repetition }}</td>
                                    </tr>
                                
                                    <tr>
                                        <td id="text-ficha">Carga:</td>
                                        <td id="text-dados-ficha">{{ isset($studentFicha->weight) ? $studentFicha->weight : 'Livre' }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td id="text-ficha">Descanso:</td>
                                        <td id="text-dados-ficha">{{ isset($studentFicha->rest) ? $studentFicha->rest : '00:30' }}</td>
                                    </tr>
                                
                                    <tr>
                                        <td id="text-ficha">Observação:</td>
                                        <td id="text-dados-ficha">{{ isset($studentFicha->description) ? $studentFicha->description : 'Nenhuma' }}{{ $studentFicha->description }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td id="text-ficha">Criado por:</td>
                                        <td id="text-dados-ficha">{{ $firstName }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="card-action">
                            <a href="#" data-target="card-{{ $index + 1 }}" class="proximo-link">Próximo</a>
                        </div>
                    </div>
                </div>
            </div>

                    <div style="display: none">
                        <form id="form_ficha" action="{{ route('create_statistics') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user_fk" value="{{ Auth::user()->id }}" readonly>
                            <input type="hidden" name="id_ficha_fk" value="{{ $studentFicha->id_ficha }}" readonly>
                
                    </div>
        @endforeach
        
                            <div class="row center">
                                <div class="col s12 section scrollspy" id="id8">            
                                <button class="btn btn-large waves-effect waves-light orange darken-4" id="card-btn" type="submit" name="action">Finalizar treino
                                    <i class="material-icons right">done</i>
                                </button>
                            </div>
                        </form>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($studentFichas as $index => $studentFicha)
        <div id="modal{{$index}}" class="modal">
            <div class="modal-content">
                <h4 id="card-title">{{ $studentFicha->name_exercise }}</h4>
                <div class="card">
                    <div class="card-image">
                    <img src="/img/exercise/gif/{{ $studentFicha->gif_exercise }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn light-blue darken-4 left white-text">Fechar</a>
            </div>
        </div>
    @endforeach

    <!-- Modal de alerta -->
    <div id="modal-alerta" class="modal">
        <div class="modal-content">
            <i class="material-icons" id="modal-icon-alert">info</i>
            <h4>Confirmação de Treino</h4>
            <p>Deseja finalizar o treino ?</p>
        </div>

        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
            <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Sim</a>
        </div>
    </div>

    @section('script')
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                let modal = document.getElementById('modal-alerta');
                let instance = M.Modal.init(modal);

                let form = document.querySelector('#form_ficha');

                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    instance.open();
                });

                let cancelBtn = document.getElementById('cancelBtn');

                cancelBtn.addEventListener('click', function() {
                    instance.close();
                });

                let sendBtn = document.getElementById('sendBtn');

                sendBtn.addEventListener('click', function() {
                    form.submit();
                });
            });

            // Captura todos os links com a classe "proximo-link"
            let linksProximo = document.querySelectorAll(".proximo-link");
        
            // Adiciona um evento de clique a todos os links "Próximo"
            linksProximo.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault(); // Previne o comportamento padrão de clicar em um link
        
                    // Obtém o ID do card de destino do atributo "data-target"
                    let targetID = link.getAttribute("data-target");
        
                    // Rola a página verticalmente para o card de destino
                    let cardDestino = document.getElementById(targetID);
                    if (cardDestino) {
                        cardDestino.scrollIntoView({
                            behavior: "smooth"
                        });
                    }
                });
            });
        </script> 
    @endsection

@endsection