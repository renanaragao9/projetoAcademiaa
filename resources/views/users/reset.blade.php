@extends('layouts.users')

@section('title', 'Alterar Senha')

@section('content')
    <div class="container">
        <div class="row" id="reset-form">
            <div class="card z-depth-5" id="card-form">
                <header class="card-content center-align">
                    <div class="card" id="card-tile-mobile">
                        <div class="row">
                            <div class="col s12 l10">
                            <i class="material-icons" id="homeUserTitle-icon">lock_reset</i>
                            <h3 id="homeUserTitle"> Trocar Senha</h3>
                            </div>
                        </div>
                    </div>
                </header>
                
                <form id="form_password" method="POST" action="{{ route('students.reset') }}">
                @csrf
                
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field">
                                <input id="password" type="password" name="password" class="validate" required>
                                <span class="helper-text" ></span>
                                <label for="password">Senha</label>
                                <i class="material-icons prefix" id="show_password_1" style="cursor: pointer;">visibility_off</i>
                            </div>

                            <div class="input-field">
                                <input id="confirm_password" type="password" name="confirm_password" class="validate" required>
                                <span class="helper-text"></span>
                                <label for="confirm_password">Confirme a Senha</label>
                                <i class="material-icons prefix" id="show_password_2" style="cursor: pointer;">visibility_off</i>
                            </div>
                            
                            <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Trocar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de alerta -->
    <div id="modal-alerta" class="modal">
        <div class="modal-content">
            <i class="material-icons" id="modal-icon-alert">info</i>
            <h4>Confirmação de Redefinição</h4>
            <p>Deseja realmente trocar sua senha de acesso ?</p>
        </div>

        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat right" id="cancelBtn">Cancelar</a>
            <a href="#" class="modal-close waves-effect waves-green btn light-blue darken-4 left" id="sendBtn">Sim</a>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/mobile/resetPassword.js') }}"></script> 
@endsection