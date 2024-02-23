@extends('layouts.admin')

@section('title', 'Alunos')

@section('content')

    <!-- Cabeçalho com a foto do aluno -->
    <div class="card">
        <div class="row">
            <div class="col s12">
                <h1 class="center" id="homeTitle">Perfil do Aluno</h1>
            </div>
            <div class="col s3">
              <img src="/img/profile_photo_path/{{$user->profile_photo_path}}" alt="Foto do Aluno" class="hide-on-small-only" id="view-img">
            </div>
            <div class="col s12 l6">
                <h3 class="center" id="homeTitle">{{ $user->name }}</h3>
              </div>
          </div>

          <!-- Dados do Usuário -->
          <div class="row">
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Atalhos</h4>
                    <tbody>
                        <tr>
                            <td id="text-profile">Mensalidade:</td>
                            <td id="text-dados-profile"> <a href="{{ route('admin.payments.register', $user->id) }}" class="btn-floating tooltipped teal darken-4 btn-large waves-effect waves-light red" data-position="bottom" data-tooltip="Mensalidade"><i class="material-icons">payments</i></a> </td>
                        </tr>
                        
                        <tr>
                            <td id="text-profile">Ficha:</td>
                            <td id="text-dados-profile"> {{\Carbon\Carbon::parse($user->date)->format('d/m/Y')}} </td>
                        </tr>
                    
                        <tr>
                            <td id="text-profile">Avaliação:</td>
                            <td id="text-dados-profile"> {{$user->sexo }}</td>
                        </tr>
                        
                        <tr>
                            <td id="text-profile">Editar:</td>
                            <td id="text-dados-profile"> {{$user->phone}} </td>
                        </tr>

                        <tr>
                            <td id="text-profile">Resetar Senha:</td>
                            <td id="text-dados-profile"> {{$user->phone}} </td>
                        </tr>
                        <!--
                            <tr>
                                <td id="text-profile">Criado em:</td>
                                <td id="text-dados-profile"> {{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                            </tr>
                        -->
                    </tbody>
                </table>
            </div>
      
          <!-- Dados do Usuário -->
          <div class="row">
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Dados</h4>
                    <tbody>
                        <tr>
                            <td id="text-profile">Email:</td>
                            <td id="text-dados-profile"> {{$user->email}} </td>
                        </tr>
                        
                        <tr>
                            <td id="text-profile">Data de Nascimento:</td>
                            <td id="text-dados-profile"> {{\Carbon\Carbon::parse($user->date)->format('d/m/Y')}} </td>
                        </tr>
                    
                        <tr>
                            <td id="text-profile">Sexo:</td>
                            <td id="text-dados-profile"> {{$user->sexo }}</td>
                        </tr>
                        
                        <tr>
                            <td id="text-profile">Telefone:</td>
                            <td id="text-dados-profile"> {{$user->phone}} </td>
                        </tr>
                        <!--
                            <tr>
                                <td id="text-profile">Criado em:</td>
                                <td id="text-dados-profile"> {{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                            </tr>
                        -->
                    </tbody>
                </table>
            </div>

            <!-- Mensalidades do Usuário -->
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Mensalidades</h4>
                    @if(!empty($payments)) 
                        <tbody>
                            @foreach ($payments as $payment)      
                                <tr>
                                    <td id="text-profile">Referencia:</td>
                                    <td id="text-dados-profile"> {{$payment->monthly->name_monthly}} </td>
                                    <td id="text-profile">Data:</td>
                                    <td id="text-dados-profile"> {{\Carbon\Carbon::parse($payment->date_payment)->format('d/m/Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else 
                        <p class="left">Aluno não possui mensalidade</p>
                    @endif
                </table>
            </div>

            <!-- Fichas do Usuário -->
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Fichas</h4>
                    @if(!empty($fichas)) 
                        <tbody>
                            @foreach ($fichas as $ficha)      
                                <tr>
                                    <td id="text-profile">Treino:</td>
                                    <td id="text-dados-profile"> {{$ficha->name_training}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else 
                        <p class="left">Aluno não possui ficha</p>
                    @endif
                </table>
            </div>

            <!-- Treinos Finalizados do Usuário -->
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Treinos Finalizado</h4>
                    @if(!empty($statistics)) 
                        <tbody>
                            @foreach ($statistics as $statistic)      
                                <tr>
                                    <td id="text-profile">Ficha:</td>
                                    <td id="text-dados-profile"> {{ $statistic->name_training }} </td>
                                    <td id="text-profile">Dia:</td>
                                    <td id="text-dados-profile"> {{ \Carbon\Carbon::parse($statistic->created_at)->format('d/m/Y H:i:s')}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else 
                        <p class="left">Aluno não possui ficha</p>
                    @endif
                </table>
            </div>
            
            <!-- Avaliações do Usuário -->
            <div class="col s12 l6">
                <table class="highlight">
                    <h4>Avaliações</h4>
                    @if(!empty($assessments)) 
                        <tbody>
                            @foreach ($assessments as $assessment)      
                                <tr>
                                    <td id="text-profile">Meta:</td>
                                    <td id="text-dados-profile"> {{ $assessment->goal }} </td>
                                    <td id="text-profile">Prazo:</td>
                                    <td id="text-dados-profile"> {{ $assessment->term }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else 
                        <p class="left">Aluno não possui avaliação</p>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });

    document.getElementById('usuarioForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Evita o envio padrão do formulário

      // Aqui você pode adicionar código para validar e enviar os dados do formulário
      // Por exemplo, você pode recuperar os valores dos campos de entrada e validar se estão preenchidos corretamente

      // Exemplo de validação simples (apenas verifica se o campo nome está preenchido)
      var nomeInput = document.getElementById('nome');
      var nomeValue = nomeInput.value.trim(); // Remove espaços em branco extras do início e do fim do valor

      if (nomeValue === '') {
        M.toast({html: 'Por favor, preencha o campo nome', classes: 'rounded'});
        nomeInput.focus(); // Foca no campo nome
        return; // Interrompe a execução da função
      }

      // Se passou na validação, você pode prosseguir com o envio dos dados ou realizar outras operações
      // Por exemplo, você pode enviar os dados para o servidor usando fetch() ou XMLHttpRequest

      // Aqui você pode adicionar código para enviar os dados do formulário para o servidor
      // Por exemplo:
      // fetch('url_do_servidor', {
      //   method: 'POST',
      //   body: new FormData(this)
      // })
      // .then(response => {
      //   if (response.ok) {
      //     // Dados enviados com sucesso
      //   } else {
      //     throw new Error('Erro ao enviar os dados');
      //   }
      // })
      // .catch(error => {
      //   console.error('Erro:', error);
      // });

      // Exibindo mensagem de sucesso
      M.toast({html: 'Dados do usuário salvos com sucesso', classes: 'rounded green'});
    });
  </script>
@endsection