# Sistema de Gerenciamento de Academias

Este é um projeto de um sistema de gerenciamento de academias desenvolvido em Laravel e utilizando Materialize.css para a interface.

## Funcionalidades

- Gestão de fichas de treino
- Avaliações físicas
- Cadastro de alunos e instrutores

## Instalação

Siga os passos abaixo para configurar o ambiente de desenvolvimento:

1. Clone o repositório:
<div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
    <pre>
        <code>
git clone https://github.com/renanaragao9/projetoAcademiaa.git
        </code>
    </pre>
</div>
2. Navegue até o diretório do projeto:
3.  cd projetoAcademiaa
4. Instale as dependências do PHP:
5.  composer install
6. Instale as dependências do Node.js:
7.  npm install
8.  Configure o arquivo .env
9.  Gere a chave da aplicação:
 php artisan key:generate
7. Execute as migrações do banco de dados atraves dos aquivos sql dentro da pasta database (precisa atualizar para migrations:
8.  Inicie o servidor de desenvolvimento:
    php artisan serve

Agora você pode acessar o sistema através do endereço `http://localhost:8000`.

## Tecnologias Utilizadas

- Laravel
- Materialize.css
- PHP
- JavaScript
- MySQL

## Contribuição

## Licença

Este projeto está licenciado sob os termos da licença 
