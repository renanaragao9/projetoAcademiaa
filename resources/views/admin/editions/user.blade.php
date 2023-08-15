@extends('layouts.admin')

@section('title', 'Cadastro de Aluno')

@section('content')

    <!-- Inicio de conteudo -->
    <div class="row">
        <div class="col s12 m12">
            <div class="card white">
                <div class="card-content">           
                    <div class="row">
                        <form method="POST" action="{{ route('admin.user.update', $user->id) }}" class="col s12" >
                            @method('PUT')
                            @csrf
                            <div class="input-field col s12 l12">
                                <h3 class="center" id="titleColor">Edição: Aluno(a)</h3>
                                <h4 class="center" id="titleColor">~ {{ $user->name }} ~</h4>
                              </div>

                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="name" id="icon-nome" type="text" class="validate" value="{{ $user->name }}">
                                <label for="icon-nome">Nome</label>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">wc</i>
                                <select name="sexo">
                                  <option value="" disabled selected>Opção</option>
                                  <option value="Masculino" {{ $user->sexo == "Masculino" ? "selected='selected'" : "" }}>Masculino</option>
                                  <option value="Feminino" {{ $user->sexo == "Feminino" ? "selected='selected'" : "" }}>Feminino</option>
                                  <option value="Outros">Outros</option>
                                </select>
                                <label>Sexo</label>
                            </div>                            
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">phone</i>
                                <input name="phone" id="icon_telephone" type="tel" class="validate" value="{{ $user->phone }}">
                                <label for="icon_telephone">Telefone</label>
                            </div>
                            
                            <div class="input-field col s12 l6">
                                <i class="material-icons prefix">calendar_month</i>                       
                                <input name="date" type="date" class="datepicker" value="{{ $user->date }}">
                            </div>
                            
                            <div class="input-field col s12 l12">
                                <i class="material-icons prefix">mail</i>
                                <input name="email" id="email" type="email" class="validate" value="{{ $user->email }}">
                                <label for="email">E-mail</label>
                                <span class="helper-text" data-error="Email Inválido" data-success="Email Valido"></span>
                            </div>

                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="hidden" name="password" value="{{$user->password}}">

                            <div class="input-field col s12 l12">
                                <button class="btn waves-effect waves-light light-blue darken-4 col s12 l5" id="save-button" type="submit" name="action" onclick="confirmSubmit()">Cadastrar
                                  <i class="material-icons right">save</i>
                                </button>
                                  
                                <a href="{{ route('admin.users') }}" class="waves-effect waves-light btn right light-blue darken-4 col s12 l5"><i class="material-icons right">table_rows</i>Alunos</a>
                      
                                <div class="input-field col s12 l12">
                                  <a href="{{ route('admin.home') }}" class="waves-effect waves-light btn left light-blue darken-4 col s12 l5" id="bottom-form-action"><i class="material-icons right">arrow_back</i>Voltar</a>
                                </div>
                              </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <!-- Fim de conteudo -->

@endsection