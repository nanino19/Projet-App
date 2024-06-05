document.addEventListener("DOMContentLoaded", function () {
    const openPopupBtns = document.querySelectorAll(".open-popup-btn");
    const customPopupOverlay = document.querySelector(".custom-popup-overlay");
    const closePopupBtn = document.querySelector("#popup-close");
    const filmNameElement = document.getElementById("film-name");
    const seanceHoraireElement = document.getElementById("seance-horaire");
    const compteur = document.getElementById("places-disponibles");
    const reserveButton = document.getElementById("reserve-button");
    const paymentInfo = document.getElementById("payment-info");
    const paypalButtonContainer = document.getElementById("paypal-button-container");
    let placesDisponibles = 0;
    let currentFilmId = null;
    let currentHoraire = null;

    openPopupBtns.forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            currentFilmId = btn.getAttribute("data-film-id");
            currentHoraire = btn.getAttribute("data-horaire");

            fetch(`getSeance.php?id_film=${currentFilmId}&horaire=${currentHoraire}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        filmNameElement.textContent = data.film;
                        seanceHoraireElement.textContent = `Séance à ${data.horaire}`;
                        placesDisponibles = data.nombre_de_places;
                        compteur.textContent = `${placesDisponibles} places disponibles`;
                        customPopupOverlay.style.display = "flex";
                        paymentInfo.style.display = "none";
                        paypalButtonContainer.innerHTML = ''; // Nettoyer le conteneur PayPal
                    }
                })
                .catch(error => console.error('Erreur:', error));
        });
    });

    closePopupBtn.addEventListener("click", function () {
        customPopupOverlay.style.display = "none";
    });

    reserveButton.addEventListener("click", function () {
        if (placesDisponibles > 0) {
            if (confirm("Êtes-vous sûr de vouloir réserver cette place ?")) {
                fetch(`reserveSeance.php?id_film=${currentFilmId}&horaire=${currentHoraire}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            placesDisponibles--;
                            compteur.textContent = `${placesDisponibles} places disponibles`;
                            alert(data.success);
                            paymentInfo.style.display = "block";
                            setTimeout(function () {
                                paypal.Buttons({
                                    createOrder: function (data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: '8'
                                                }
                                            }]
                                        });
                                    },
                                    onApprove: function (data, actions) {
                                        return actions.order.capture().then(function (details) {
                                            alert('Transaction completed by ' + details.payer.name.given_name);
                                        });
                                    },
                                    onError: function (err) {
                                        console.error('Payment Error:', err);
                                        alert("Paiement échoué !");
                                    }
                                }).render('#paypal-button-container');
                            }, 0); // Assurez-vous que l'élément est bien rendu avant d'initialiser PayPal
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
            }
        } else {
            alert("Désolé, plus de places disponibles !");
        }
    });
});
