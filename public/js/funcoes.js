$(document).ready(function(){

  //new window.VLibras.Widget('https://vlibras.gov.br/app');

  // Chamada para o botao flutuante
  $('.fixed-action-btn').floatingActionButton({
    hoverEnabled: false
  });

  // Chamada para ativar o sidenav lateral
  $('.sidenav').sidenav();

  // Chamada para ativar o dropdown da navbar
  $('.collapsible').collapsible();

  /*
    $(".dropdown-trigger").dropdown({ 
      coverTrigger: false,
    });
    
    $(".dropdown-table").dropdown({ 
      coverTrigger: false,
    });
  */
  // Chamada para o Modal
  $('.modal').modal();

  // Chamada para ampliação da imagem
  $('.materialboxed').materialbox();

  // Chamada para o scroll lateral
  $('.scrollspy').scrollSpy();

  // Chamada para os selects
  $('select').formSelect();

  // Chamada para a descrição dos icones na tabela
  $('.tooltipped').tooltip();

  //CKEDITOR.replace('body');

  // Chamada para o limite do textarea
  $('input#input_text, textarea#observation').characterCounter();

  /*
  $('.datepicker').pickadate({
    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Pronto',
    labelMonthNext: 'Próximo mês',
    labelMonthPrev: 'Mês anterior',
    labelMonthSelect: 'Selecione um mês',
    labelYearSelect: 'Selecione um ano',
    selectMonths: true, 
    selectYears: 15 
    });
  */
});

 // enviar logout pela tag <a> com desktop
 document.getElementById('logout-link').addEventListener('click', function(e) {
  e.preventDefault();
  document.getElementById('logout-form').submit();
});

// enviar logout pela tag <a> com o mobille
  document.getElementById('logout-link-mobile').addEventListener('click', function(e) {
  e.preventDefault();
  document.getElementById('logout-form').submit();
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.tooltipped');
  var instances = M.Tooltip.init(elems, options);
});


/* Chamada para tela ficar Fullscreen */
  function fullScreen() {        
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
  }



      
function myFunction() {
    myVar = setTimeout(showPage); // aumentei o tempo para ilustração
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
