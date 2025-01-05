document.addEventListener("DOMContentLoaded", () => {
    // Gestion des boutons Ajouter
    document.querySelectorAll(".btn-ajouter").forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault(); // Empêche le rechargement de la page
            const url = event.currentTarget.getAttribute("href");

            // Envoie une requête AJAX pour ajouter un produit
            fetch(url, { method: "GET" })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Produit ajouté au panier !");
                        // Mettre à jour l'interface (par exemple, un compteur)
                    } else {
                        alert("Erreur : impossible d'ajouter le produit.");
                    }
                })
                .catch((error) => console.error("Erreur AJAX :", error));
        });
    });

    // Gestion des boutons Retirer
    document.querySelectorAll(".btn-retirer").forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault(); // Empêche le rechargement de la page
            const url = event.currentTarget.getAttribute("href");

            // Envoie une requête AJAX pour retirer un produit
            fetch(url, { method: "GET" })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Produit retiré du panier !");
                        // Mettre à jour l'interface (par exemple, un compteur)
                    } else {
                        alert("Erreur : impossible de retirer le produit.");
                    }
                })
                .catch((error) => console.error("Erreur AJAX :", error));
        });
    });
});
