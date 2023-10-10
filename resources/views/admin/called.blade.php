@extends('layouts.admin')

@section('title', 'Chamados')

@section('content')


    <div class="row">
        <div class="col s12 z-depth-3">
            <div class="card">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12 l12">
                            <h3 class="center" id="titleColor">Painel de Chamados</h3>
                            <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l2" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                        </div>
                    </div>
                </div>

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
            </div>
        </div>
    </div> 

@endsection