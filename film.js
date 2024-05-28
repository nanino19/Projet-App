document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM entièrement chargé et analysé");
    const openPopupBtn = document.querySelector(".open-popup-btn");
    const customPopupOverlay = document.querySelector(".custom-popup-overlay");
    const closePopupBtn = document.querySelector(".close-popup-btn");

    openPopupBtn.addEventListener("click", function(event) {
        event.preventDefault();
        console.log("Bouton ouvrir popup cliqué");
        customPopupOverlay.style.display = "flex"; // Affiche l'overlay de la popup
    });

    closePopupBtn.addEventListener("click", function(event) {
        console.log("Bouton fermer popup cliqué");
        customPopupOverlay.style.display = "none"; // Cache l'overlay de la popup
    });
});
