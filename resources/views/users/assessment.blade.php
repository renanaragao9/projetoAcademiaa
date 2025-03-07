@extends('layouts.users')

@section('title', 'Avaliação')

@section('content')

    <div class="container">
        <div class="row">

            <!--Divs para titulo -->
            <div class="card" id="card-tile-mobile">
                <div class="row">
                  <div class="col s12 l12">
                      <i class="material-icons" id="homeUserTitle-icon">analytics</i>
                      <h3 id="homeUserTitle" class="center"> Ficha de Avaliação</h3>
                      <h3 id="homeUserTitle" class="center"> Data: {{ \Carbon\Carbon::parse($studentAssessments[0]->created_at)->format('d/m/Y') }}</h3>  
                  </div>
                </div>
            </div>

            @if($studentAssessments->count() > 0)
                @foreach ($studentAssessments as $studentAssessment)
                    
                     <!-- Cards da avaliação-->
                     <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/prancheta.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Prancheta de Avaliação">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Meta</p>
                                        <p >{{$studentAssessment->goal}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                     <!-- Cards da avaliação-->
                     <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/calendario.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Calendario">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Prazo</p>
                                        <p >{{$studentAssessment->term}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/altura.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Altura">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Altura</p>
                                        <p >{{$studentAssessment->height}} M</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/balanca.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Balança">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Peso</p>
                                        <p >{{$studentAssessment->weight}} Kg</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/musculo.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Musculo do Braço">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Braço</p>
                                        <p >{{$studentAssessment->arm}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/antebraco.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Musculo do Antebraço">
                                </div>
                                    
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Antebraço</p>
                                        <p >{{$studentAssessment->forearm}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/peito.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Peito">
                                </div>
                                    
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <p >Peito</p>
                                        <p >{{$studentAssessment->breastplate}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/costas.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem Costas">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Costas</p>
                                        <p >{{$studentAssessment->back}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/cintura.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Cintura">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Cintura</p>
                                        <p >{{$studentAssessment->waist}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/gluteos.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Glúteo">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Glúteo</p>
                                        <p >{{$studentAssessment->glute}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                     <!-- Cards da avaliação-->
                     <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/quadril.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem do Quadril">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Quadril</p>
                                        <p >{{$studentAssessment->hip}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da avaliação-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/coxa.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Coxa">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Coxa</p>
                                        <p >{{$studentAssessment->thigh}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Cards da ficha-->
                    <div class="row">
                        <a href="#!">
                            <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                                <div class="card-image">
                                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('img/img_icon/panturrilha.png'))) }}" class="responsive-img circle" id="assessment-icon-img" alt="Imagem da Panturrilha">
                                </div>
                                
                                <div class="card-stacked">
                                    <div class="card-content ">
                                        <p >Panturrilha</p>
                                        <p >{{$studentAssessment->calf}} cm</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @break
                @endforeach
                
                @if($studentAssessments->count() > 1)
                    <div class="row">
                        <div class="row">
                            <div class="col s12">
                                <h5 id="title-card" class="center">Gráfico:</h5>
                                <p class="center">Para uma melhor visualização vire o celular na horizontal e atualize a página</p>
                            </div>
                        </div>
                    </div>
                
                    <!--Div para o ChartJs -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <canvas id="chart"></canvas>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div id="error-not-traning">
                    <p>Você ainda não possui uma avaliação.</p>
                    <p>Entre em contato com o seu personal para realiazar uma nova avaliação.</p>
                    <p>Ou <a href="{{ route('students.called', Auth::user()->id) }}">clique aqui</a> para abrir uma chamado e solicitar a avaliação </p>
                </div>
            @endif    
        </div>
    </div>
    
    @if($studentAssessments->count() > 1)
        @section('script')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: ['Altura', 'Peso', 'Braço', 'Antebraço', 'Peito', 'Costas', 'Cintura', 'Glúteo', 'Quadril', 'Coxa', 'Panturrilha'],
                    datasets: [{
                        label: 'Avaliação 2',
                        data: [{{ $avaliacao_1->height }}, {{ $avaliacao_1->weight }}, {{ $avaliacao_1->arm }}, {{ $avaliacao_1->forearm }}, {{ $avaliacao_1->breastplate }}, {{ $avaliacao_1->back }}, {{ $avaliacao_1->waist }}, {{ $avaliacao_1->glute }}, {{ $avaliacao_1->hip }}, {{ $avaliacao_1->thigh }},{{ $avaliacao_1->calf }}],
                        backgroundColor: 'rgba(63, 81, 181, 0.6)',
                        borderColor: 'rgba(63, 81, 181, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Avaliação 1',
                        data: [{{ $avaliacao_2->height }}, {{$avaliacao_2->weight }}, {{$avaliacao_2->arm }}, {{$avaliacao_2->forearm }}, {{$avaliacao_2->breastplate }}, {{$avaliacao_2->back }}, {{$avaliacao_2->waist }}, {{$avaliacao_2->glute }}, {{$avaliacao_2->hip }}, {{$avaliacao_2->thigh }},{{$avaliacao_2->calf }}],
                        backgroundColor: 'rgba(244, 67, 54, 0.6)',
                        borderColor: 'rgba(244, 67, 54, 1)',
                        borderWidth: 1
                    }]
                    },
                    options: {
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                        }]
                    }
                    }
                });
                });
            </script>
        @endsection
    @endif
@endsection