
// Função para filtrar os registros da tabela
function filterTable() {
    let input = document.getElementById('search');
    let filter = input.value.toLowerCase();
    let rows = document.getElementById('table-body').getElementsByTagName('tr');
    let noResultsMessage = document.getElementById('no-results');
    let totalRecords = document.getElementById('total-records');

    let resultsFound = false;
    let count = 0;

    for (let i = 0; i < rows.length; i++) {
      let nome = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
      let email = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
      let aluno = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();

      if (nome.indexOf(filter) > -1 || email.indexOf(filter) > -1 || aluno.indexOf(filter) > -1) {
        rows[i].style.display = '';
        resultsFound = true;
        count++;
      } else {
        rows[i].style.display = 'none';
      }
    }

    if (resultsFound) {
      noResultsMessage.style.display = 'none';
    } else {
      noResultsMessage.style.display = 'block';
    }

    totalRecords.innerText = "Total de registros encontrados: " + count;
  }

  // Evento de input para acionar a filtragem ao digitar na caixa de pesquisa
  document.getElementById('search').addEventListener('input', filterTable);