
/*Scrollear a Noticias*/
document.addEventListener("DOMContentLoaded", function() {
    // Botón Scroll Noticias
    document.getElementById("go-to-news").addEventListener("click", scrollNews);

    //Botón scroll Manzanillo
    document.getElementById("go-to-mzo").addEventListener("click", scrollMzo);

    // Flecha hacia abajo
    document.querySelector(".main-downarrow").addEventListener("click", scrollNews);

    function scrollNews() {
        var sectionId = "mainnews-container";
        var destinationSection = document.getElementById(sectionId);
        var destinationPosition = destinationSection.offsetTop;
        
        window.scrollTo({
            top: destinationPosition,
            behavior: 'smooth' // Esto hace que el scroll sea suave
        });
    }
    function scrollMzo() {
        var sectionId = "mzo";
        var destinationSection = document.getElementById(sectionId);
        var destinationPosition = destinationSection.offsetTop;

        window.scrollTo({
            top: destinationPosition,
            behavior: 'smooth'
        });
    }
});