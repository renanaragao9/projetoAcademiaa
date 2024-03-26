let currentIndex = 0;

    function changeSlide(index) {
      const slides = document.querySelector('.carousel-slide');
      const totalSlides = document.querySelectorAll('.carousel-item').length;

      currentIndex = (currentIndex + index + totalSlides) % totalSlides;

      const translateValue = -currentIndex * 100 + '%';
      slides.style.transform = 'translateX(' + translateValue + ')';
      updateIndicators();
    }

    function updateIndicators() {
      const indicators = document.querySelectorAll('.indicator');
      indicators.forEach((indicator, index) => {
        indicator.classList.remove('active');
        if (index === currentIndex) {
          indicator.classList.add('active');
        }
      });
    }

    function autoChangeSlide() {
      changeSlide(1);
    }

    setInterval(autoChangeSlide, 6000);

    const totalSlides = document.querySelectorAll('.carousel-item').length;
    const indicatorContainer = document.querySelector('.indicator-container');

    for (let i = 0; i < totalSlides; i++) {
      const indicator = document.createElement('div');
      indicator.classList.add('indicator');
      indicatorContainer.appendChild(indicator);

      indicator.addEventListener('click', () => {
        changeSlide(i);
      });
    }

    updateIndicators();

    document.addEventListener('DOMContentLoaded', function() {
      // Função para obter a saudação com base na hora do dia
      function getSaudacao() {
          const agora = new Date();
          const hora = agora.getHours();

          let saudacao;

          if (hora >= 5 && hora < 12) {
              saudacao = 'Bom dia';
          } else if (hora >= 12 && hora < 18) {
              saudacao = 'Boa tarde';
          } else {
              saudacao = 'Boa noite';
          }

          return saudacao;
      }

      // Exibe a saudação na página
      const saudacaoElemento = document.getElementById('homeUserTitle');
      const saudacaoTexto = getSaudacao();
      saudacaoElemento.innerHTML = `${saudacaoTexto}, ${firstName}. <br> Tenha um bom treino!`;

      const likeButton = document.querySelector('.like');
      likeButton.addEventListener('click', function() {
        const icon = this.querySelector('.material-icons');
        icon.classList.toggle('liked');
      });
    });