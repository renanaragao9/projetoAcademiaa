@extends('layouts.users')

@section('title', 'Painel do Aluno')

@section('content')

    <div class="container">
        <div class="row">
        
            <!--Divs para titulo -->
            <div class="row">
                <div class="row">
                    <div class="col s12">
                        <h5 id="title-card" class="center">Ficha de avaliação:</h5>
                        <h6 id="title-card" class="center">{{ Auth::user()->name }}</h6>
                    </div>
                </div>
            </div>

            @foreach ($studentAssessments as $studentAssessment)
                <!-- Cards da avaliação-->
                <div class="row">
                    <a href="#!">
                        <div class="card horizontal z-depth-3 waves-light" id="assessment-mobile">
                            <div class="card-image">
                                <img src="/img/img_icon/altura.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/balanca.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/musculo.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/antebraco.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/peito.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/costas.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/cintura.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/quadril.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/gluteos.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/coxa.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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
                                <img src="/img/img_icon/panturrilha.png" class="responsive-img circle" id="assessment-icon-img" alt="">
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

            <div class="row">
                <div class="row">
                    <div class="col s12">
                        <h5 id="title-card" class="center">Gráfico:</h5>
                        <p>Para uma melhor visualização vire o celular na horizontal</p>
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
        </div>
    </div>

@endsection