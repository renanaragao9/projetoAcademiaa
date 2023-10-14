@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col s12">
                    <h5 id="title-card" class="center">Ficha de treino:</h5>
                    <h6 id="title-card" class="center">{{ $fichaNome->name_training }}</h6>
                </div>
            </div>
        </div>

        @foreach ($studentFichas as $index => $studentFicha)
            <!-- INICIO DA CARD -->
            <div class="row">
                <div class="col s12 m7">
                    <div class="card" id="card-{{ $index }}">
                        <div class="card-image">
                            <img class="materialboxed" src="/img/exercise/{{ $studentFicha->image_exercise }}">
                            <a class="modal-trigger btn-floating halfway-fab waves-effect waves-light red" href="#modal{{$index}}"><i class="material-icons">movie</i></a>
                        </div>
                        
                        <div class="card-content z-depth-1">
                            <span class="card-title" id="card-title">{{ $studentFicha->name_exercise }}</span>
            
                            <p id="card-text"> <strong id="strong"> Serie: </strong> {{ $studentFicha->serie }}X</p>
                            <p id="card-text"> <strong id="strong"> Repetição: </strong> {{ $studentFicha->repetition }}X</p>
                            <p id="card-text"> <strong id="strong"> Carga: </strong> {{ $studentFicha->weight }}Kg</p>
                            <p id="card-text"> <strong id="strong"> Descanso: </strong> {{ $studentFicha->rest }}s</p>
                            <p id="card-text"> <strong id="strong"> Observação: </strong> {{ $studentFicha->description }} </p>
                            <p id="card-text"> <strong id="strong"> Criado por: </strong> {{ $firstName }} </p>
                        </div>
                        
                        <div class="card-action">
                            <a href="#" data-target="card-{{ $index + 1 }}" class="proximo-link">Próximo</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row center">
            <div class="col s12 section scrollspy" id="id8">            
            <button class="btn btn-large waves-effect waves-light orange darken-4" id="card-btn" type="submit" name="action">Finalizar treino
                <i class="material-icons right">done</i>
            </button>
            </div>
        </div>
    </div>

    <!-- Modal 1 -->
    @foreach ($studentFichas as $index => $studentFicha)
        <div id="modal{{$index}}" class="modal">
            <div class="modal-content">
                <h4 id="card-title">{{ $studentFicha->name_exercise }}</h4>
                <div class="card">
                    <div class="card-image">
                    <img src="/img/exercise/{{ $studentFicha->gif_exercise }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn light-blue darken-4 left white-text">Fechar</a>
            </div>
        </div>
    @endforeach

    @section('script')
        <script>
            // Captura todos os links com a classe "proximo-link"
            var linksProximo = document.querySelectorAll(".proximo-link");
        
            // Adiciona um evento de clique a todos os links "Próximo"
            linksProximo.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault(); // Previne o comportamento padrão de clicar em um link
        
                    // Obtém o ID do card de destino do atributo "data-target"
                    var targetID = link.getAttribute("data-target");
        
                    // Rola a página verticalmente para o card de destino
                    var cardDestino = document.getElementById(targetID);
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