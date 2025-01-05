<?php
// Vérification du panier
if (!empty($_SESSION['panier'])) {
    // Calcul du total du panier
    $totalPanier = 0;
    foreach ($_SESSION['panier'] as $produitPanier) {
        $totalPanier += $produitPanier['prix'] * $produitPanier['quantite'];
    }


    $adresseFacturation = "123 Rue Exemple, 75000 Paris";
    $modePaiement = "Carte de Crédit";
    $fraisLivraison = 5.99; 
    $totalFacture = $totalPanier + $fraisLivraison;
    
    // Envoyer les données à la vue
    include_once "vue/adherent/vueAdherentFacture.php";
} else {
    echo "Le panier est vide.";
}


include_once "vue/adherent/vueAdherentFacture.php";