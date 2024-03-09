document.addEventListener("DOMContentLoaded", function() {
    // Obtenez le modal
    var modal = document.getElementById("myModal");

    // Obtenez l'élément de superposition
    var overlay = document.getElementById("modalOverlay");

    // Obtenez le bouton qui ouvre le modal
    var btn = document.getElementById("openModal");

    // Obtenez l'élément <span> qui ferme le modal
    var span = document.getElementById("closeModal");

    // Obtenez le bouton "Annuler"
    var btnCancel = document.getElementById("closeModale");

    // Quand l'utilisateur clique sur le bouton, ouvrez le modal 
    btn.onclick = function(event) {
        console.log('click');
        event.preventDefault();
        modal.style.display = "block";
        overlay.style.display = "block";
    }

    // Quand l'utilisateur clique sur <span> (x), fermez le modal
    span.onclick = function() {
        modal.style.display = "none";
        overlay.style.display = "none";
    }
    // Quand l'utilisateur clique sur "Annuler", fermez le modal
    btnCancel.onclick = function() {
        modal.style.display = "none";
        overlay.style.display = "none";
    }

    // Quand l'utilisateur clique n'importe où en dehors du modal, fermez-le
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            overlay.style.display = "none";
        }
    }
});