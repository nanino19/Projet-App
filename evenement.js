document.addEventListener("DOMContentLoaded", function() {
    const evenementImages = document.querySelectorAll(".evenement-image");

    evenementImages.forEach(function(image) {
        image.addEventListener("click", function(event) {
            event.preventDefault();

            const popup = document.querySelector(".popup-overlay");
            popup.style.display = "block";
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const evenementImages = document.querySelectorAll(".evenement-image");

    evenementImages.forEach(function(image) {
        image.addEventListener("click", function(event) {
            event.preventDefault();

            const popupOverlay = document.querySelector(".popup-overlay");
            popupOverlay.style.display = "flex"; // Affiche la popup overlay

            const popup = document.querySelector(".popup");
            popup.style.display = "block"; // Affiche la popup
        });
    });

    const popupCloseButton = document.getElementById("popup-close");
    popupCloseButton.addEventListener("click", function() {
        const popupOverlay = document.querySelector(".popup-overlay");
        popupOverlay.style.display = "none"; // Cache la popup overlay

        const popup = document.querySelector(".popup");
        popup.style.display = "none"; // Cache la popup
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Nombre de places disponibles initial
    let placesDisponibles = 20;

    // Sélection de l'élément du compteur de places disponibles
    const compteur = document.getElementById("places-disponibles");

    // Mise à jour du contenu initial du compteur
    compteur.textContent = placesDisponibles + " places disponibles";

    // Sélection du bouton "Réserver"
    const reserveButton = document.getElementById("reserve-button");

    // Ajout d'un gestionnaire d'événement pour le clic sur le bouton "Réserver"
    reserveButton.addEventListener("click", function() {
        // Vérification s'il reste des places disponibles
        if (placesDisponibles > 0) {
            // Réduction du nombre de places disponibles
            placesDisponibles--;
            // Mise à jour du contenu du compteur
            compteur.textContent = placesDisponibles + " places disponibles";
        } else {
            // Affichage d'un message si toutes les places sont réservées
            alert("Désolé, plus de places disponibles !");
        }
    });
});