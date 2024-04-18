document.addEventListener('DOMContentLoaded', function () {
    const selectElement = document.getElementById('categories');
    const affiches = document.querySelector('.affiches');

    selectElement.addEventListener('change', function (event) {
        console.log('Catégorie sélectionnée :', event.target.value);
        const selectedCategory = event.target.value;
        loadAffiches(selectedCategory);
    });

    function loadAffiches(category) {
        console.log('Chargement des affiches pour la catégorie :', category);

        // Masquer toutes les affiches
        const allAffiches = document.querySelectorAll('.affiche');
        allAffiches.forEach(affiche => {
            affiche.style.display = 'none';
        });

        // Afficher les affiches correspondant à la catégorie sélectionnée
        const selectedAffiches = document.querySelectorAll(`.affiche[data-category="${category}"]`);
        selectedAffiches.forEach(affiche => {
            affiche.style.display = 'flex';
        });

        // Afficher la section des affiches
        affiches.style.display = 'flex';
    }
});