@extends('layouts.admin')

@section('title', 'Cadastro de Aluno')

@section('content')

    <!--Divs para titulo e Reporte -->
    <div class="col s12 l10">
        <h3 id="titleColor">Cadastro de Aluno</h3>
    </div>
    
    <div class="col l2" id="button-report">
        <h2>
            <a class="waves-effect waves-light btn modal-trigger blue accent-2" href="#report-modal"><i class="material-icons left" >bug_report</i>Reportar</a>
        </h2>
    </div>
      
    <!-- Inicio de conteudo -->
    <div class="row">
        <div class="col s12 m12 z-depth-5">
            <div class="card white">
                <div class="card-content">           
                    <div class="row">
                        <form class="col s12">
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon-nome" type="text" class="validate">
                                <label for="icon-nome">Nome</label>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_sobrenome" type="text" class="validate">
                                <label for="icon_sobrenome">Sobrenome</label>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_telephone" type="tel" class="validate">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">calendar_month</i>                       
                                <input type="date" class="datepicker">
                                
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">mail</i>
                                <input id="email" type="email" class="validate">
                                <label for="email">E-mail</label>
                                <span class="helper-text" data-error="Email Inválido" data-success="Email Valido"></span>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" class="validate">
                                <label for="password">Senha</label>
                            </div>
                        </form>
                    </div>    
                </div>
                
                <div class="card-action">           
                    <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">Cadastrar
                        <i class="material-icons right">save</i>
                    </button>

                    <a class="waves-effect waves-light btn right light-blue darken-4" id="botao-cancelar"><i class="material-icons right">cancel</i>Cancelar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim de conteudo -->

@endsection