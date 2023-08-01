$(document).ready(function() {
    
    // Carregar tarefas existentes do localStorage ou inicializar um array vazio
    let todos = JSON.parse(localStorage.getItem('todos')) || [];

    // Função para renderizar a lista de tarefas
    function renderTodoList() {
      
        // Limpar a lista antes de renderizar novamente
      $('#todo-list').empty();

      // Percorrer todas as tarefas e adicioná-las à lista
      todos.forEach(function(todo) {
        $('#todo-list').append('<li class="collection-item">' + todo + '<a href="#" class="secondary-content delete-todo"><i class="material-icons"id="titleColor">delete</i></a></li>');
      });
    }

    // Renderizar a lista inicialmente
    renderTodoList();

    // Adicionar tarefa ao formulário
    $('#todo-form').submit(function(event) {
      event.preventDefault();

      // Obter o valor do input
      let newTodo = $('#todo-input').val();

      // Adicionar a nova tarefa ao array
      todos.push(newTodo);

      // Limpar o input
      $('#todo-input').val('');

      // Atualizar a lista de tarefas
      renderTodoList();

      // Salvar as tarefas no localStorage
      localStorage.setItem('todos', JSON.stringify(todos));
    });

    // Excluir tarefa da lista
    $(document).on('click', '.delete-todo', function() {
      
        // Obter o índice da tarefa na lista
      let index = $(this).closest('li').index();

      // Remover a tarefa do array
      todos.splice(index, 1);

      // Atualizar a lista de tarefas
      renderTodoList();

      // Salvar as tarefas no localStorage
      localStorage.setItem('todos', JSON.stringify(todos));
    });
  });