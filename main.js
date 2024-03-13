document.addEventListener("DOMContentLoaded", function() {
    var headerVideo = document.getElementById("headerVideo");
    headerVideo.addEventListener("loadeddata", function() {
        var contentHeader = document.querySelector(".content.header");
        contentHeader.classList.add("loaded");
    });

//Boton Scroll Noticias

document.getElementById("down-arrow").addEventListener("click",scrollNotice)

function scrollNotice(){
    var sectionId = "main_news"
    var destinationSection = document.getElementById(sectionId);
    var destinationPosition = destinationSection.offsetTop;
    
    window.scrollTo({
        top: destinationPosition,
        behavior: 'smooth' // Esto hace que el scroll sea suave
    });
    /*if (currentScroll>0){
        window.requestAnimationFrame(scrollNotice)
        window.scrollTo(0,currentScroll-(currentScroll/5))
    }*/
}
//Precarga de la pagina
const preloaderText = document.getElementById("preloader-text");
const content = document.getElementById("content");

// Array con las letras para mostrar
const letters = ["S","L"];

// Función para mostrar las letras una por una con animaciones suaves
function showLetters(index) {
    if (index < letters.length) {
      // Añade la letra actual
      preloaderText.textContent += letters[index];
  
      // Aplica una animación para hacer que la letra aparezca suavemente
      preloaderText.style.opacity = "0";
      preloaderText.style.animation = "appear-fade 0.8s ease-in-out forwards";
  
      // Elimina la letra después de un tiempo
      setTimeout(function() {
        // Aplica una animación de desvanecimiento después de que termine la animación de aparición
        preloaderText.style.animation = "fade-out 0.8s ease-in-out forwards";
  
        // Elimina la letra después de la animación de desvanecimiento
        setTimeout(function() {
          preloaderText.textContent = preloaderText.textContent.slice(0, -1);
          showLetters(index + 1);
        }, 500); // Tiempo de espera después de la animación de desvanecimiento
      }, 1000); // Tiempo de espera después de la animación de aparición
    } else {
      // Cuando todas las letras se han mostrado, muestra el contenido principal
      setTimeout(function() {
        content.style.opacity = "1";
        preloaderText.style.opacity = "0";
        setTimeout(function() {
          document.querySelector(".preloader").style.display = "none"; // Ocultar el preloader
        }, 800); // Ajusta este valor para la duración del preloader antes de desaparecer
      },   800); // Tiempo de espera antes de mostrar el contenido principal
    }
  }
  

// Inicia la animación al cargar la página
showLetters(0); 
}); //Final de todo
