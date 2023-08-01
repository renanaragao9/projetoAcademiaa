@extends('layouts.admin')

@section('title', 'Chamados')

@section('content')

    <!--Divs para titulo e Reporte -->
    <div class="row">
        <div class="col s12 l10">
            <h3 id="titleColor">Painel de Chamados</h3>
        </div>

        <div class="col l2" id="button-report">
            <h2>
            <a class="waves-effect waves-light btn blue accent-2"><i class="material-icons left" >bug_report</i></a>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col s12 z-depth-3">
            <div class="card">
                <ul class="collection">
                <li class="collection-item avatar">
                <img src="img/renan.jpeg" alt="" class="circle">
                <span class="title"> <strong id="strong">Nome:</strong> Renan Aragao </span>
                <p><strong id="strong">Urgencia:</strong> Media</p>
                <p><strong id="strong">Titulo:</strong> Solicitação</p>
                <p><strong id="strong">Assunto:</strong> Solicito uma ficha nova </p>                  
                
                <a href="#!" class="secondary-content tooltipped"  data-position="bottom" data-tooltip="Concluir Chamado"><i class="material-icons">check_circle</i></a>
                </li>                            
                </ul>

                <ul class="collection">
                <li class="collection-item avatar">
                <img src="img/israel.jpeg" alt="" class="circle">
                <span class="title"> <strong id="strong">Nome:</strong> Juan Victor </span>
                <p><strong id="strong">Urgencia:</strong> Media</p>
                <p><strong id="strong">Titulo:</strong> Solicitação</p>
                <p><strong id="strong">Assunto:</strong> Solicito uma Avaliação </p>                  
                
                <a href="#!" class="secondary-content tooltipped"  data-position="bottom" data-tooltip="Concluir Chamado"><i class="material-icons">check_circle</i></a>
                </li>                            
                </ul>

                <ul class="collection">
                <li class="collection-item avatar">
                <img src="img/person1.jpg" alt="" class="circle">
                <span class="title"> <strong id="strong">Nome:</strong> Marcos Lima </span>
                <p><strong id="strong">Urgencia:</strong> Alta</p>
                <p><strong id="strong">Titulo:</strong> Mudança</p>
                <p><strong id="strong">Assunto:</strong> Solicito uma mudança de treino </p>                  
                
                <a href="#!" class="secondary-content tooltipped"  data-position="bottom" data-tooltip="Concluir Chamado"><i class="material-icons">check_circle</i></a>
                </li>                            
                </ul>

                <ul class="collection">
                <li class="collection-item avatar">
                <img src="img/ocean.jpg" alt="" class="circle">
                <span class="title"> <strong id="strong">Nome:</strong> Maria Clara </span>
                <p><strong id="strong">Urgencia:</strong> baixa</p>
                <p><strong id="strong">Titulo:</strong> Mudança</p>
                <p><strong id="strong">Assunto:</strong> Solicito uma mudança do exercicio leg 45 da ficha perna </p>                  
                
                <a href="#!" class="secondary-content tooltipped"  data-position="bottom" data-tooltip="Concluir Chamado"><i class="material-icons">check_circle</i></a>
                </li>                            
                </ul>

                <ul class="collection">
                <li class="collection-item avatar">
                <img src="img/person3.jpg" alt="" class="circle">
                <span class="title"> <strong id="strong">Nome:</strong> Inaria Anastacio </span>
                <p><strong id="strong">Urgencia:</strong> Media</p>
                <p><strong id="strong">Titulo:</strong> Solicitação</p>
                <p><strong id="strong">Assunto:</strong> Solicito uma ficha nova </p>                  
                
                <a href="#!" class="secondary-content tooltipped"  data-position="bottom" data-tooltip="Concluir Chamado"><i class="material-icons">check_circle</i></a>
                </li>                            
                </ul>
            </div>
        </div>
    </div> 

@endsection