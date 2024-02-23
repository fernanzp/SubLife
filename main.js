document.addEventListener("DOMContentLoaded", function() {
    var headerVideo = document.getElementById("headerVideo");
    headerVideo.addEventListener("loadeddata", function() {
        var contentHeader = document.querySelector(".content.header");
        contentHeader.classList.add("loaded");
    });
});
