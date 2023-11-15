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
      let acao = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();

      if (nome.indexOf(filter) > -1 || acao.indexOf(filter) > -1) {
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


  document.addEventListener("DOMContentLoaded", function() {
    fetch('/admin/users-por-mes')
      .then(response => response.json())
      .then(data => {
      const meses = [];
      const usuariosCriados = [];

      data.forEach(item => {
          meses.push(`Mês ${item.month}`);
          usuariosCriados.push(item.total_users);
      });

      var ctx = document.getElementById('graficoUsuariosPorMes').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: meses,
              datasets: [{
                  label: 'Usuários Criados por Mês',
                  data: usuariosCriados,
                  backgroundColor: 'rgba(75, 192, 192, 0.5)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  });

  fetch('/admin/fichas-por-mes')
          .then(response => response.json())
          .then(data => {
              const meses = [];
              const fichasCriadas = [];

              data.forEach(item => {
                  meses.push(`Mês ${item.month}`);
                  fichasCriadas.push(item.total_fichas);
              });

              var ctx = document.getElementById('graficoFichasPorMes').getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: meses,
                      datasets: [{
                          label: 'Fichas Criadas por Mês',
                          data: fichasCriadas,
                          backgroundColor: 'rgba(255, 206, 86, 0.5)', 
                          borderColor: 'rgba(255, 206, 86, 1)',
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
              });
          });

          fetch('/admin/assessment-por-mes')
          .then(response => response.json())
          .then(data => {
              const meses = [];
              const avaliacoesCriadas = [];

              data.forEach(item => {
                  meses.push(`Mês ${item.month}`);
                  avaliacoesCriadas.push(item.total_assessment);
              });

              var ctx = document.getElementById('graficoAssessmentPorMes').getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: meses,
                      datasets: [{
                          label: 'Avaliações Criadas por Mês',
                          data: avaliacoesCriadas,
                          backgroundColor: 'rgba(139, 69, 19, 0.5)', // Cor marrom
                          borderColor: 'rgba(139, 69, 19, 1)', // Cor marrom
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
              });
          }); 
});