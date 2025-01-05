<?php
// Récupérer la liste des produits disponibles
$lesProduits = ProduitDAO::getAllProduits();

// Créer un tableau pour le panier (dans ce cas, on le gère directement ici pour la simplicité)
$panier = [];
// Supposons que vous affichez les produits dans le panier
$totalPanier = 0;

foreach ($_SESSION['panier'] as $idProduit => $produitPanier) {
    // Calcul du total produit
    $produitPanier['total'] = $produitPanier['prix'] * $produitPanier['quantite'];
    // Ajouter le total produit au panier
    $panier[] = $produitPanier;
    // Ajouter au total du panier
    $totalPanier += $produitPanier['total'];
}



// Vérification si une action de suppression est demandée
if (isset($_GET['action']) && $_GET['action'] == 'supprimerProduit' && isset($_GET['idProduit'])) {
    $idProduit = $_GET['idProduit'];

    // Vérifie si le produit est dans le panier
    if (isset($_SESSION['panier'][$idProduit])) {
        // Supprime le produit du panier
        unset($_SESSION['panier'][$idProduit]);
    }

   
}if (isset($_GET['action']) && $_GET['action'] == 'validerPanier') {
    // Vérifier si le panier n'est pas vide
    if (!empty($_SESSION['panier'])) {
        // Récupérer l'ID de l'utilisateur (on suppose qu'il est déjà connecté)
        $idUtilisateur = $_SESSION['identification']['idUtilisateur'];

        // Parcourir le panier et ajouter chaque produit dans la table lignescommande
        foreach ($_SESSION['panier'] as $idProduit => $produitPanier) {
            // Appel à la méthode de la DAO pour ajouter la ligne de commande
            LigneCommandeDAO::ajouterLigneCommande($idUtilisateur, $idProduit, $produitPanier['quantite']);
        }

        // Vider le panier après validation
        $_SESSION['panier'] = [];

        // Confirmation de la commande
        echo "<script>alert('Votre commande a été ajoutée avec succès !');</script>";

        // Redirection vers la facture avec l'idUtilisateur (ou idCommande, selon votre structure)
        header("Location: index.php?action=facture&idUtilisateur=" . $idUtilisateur);
        exit();

    } else {
        echo "<script>alert('Votre panier est vide.');</script>";
        header("Location: index.php?action=achat");
        exit();
    }
}




// Inclure la vue pour afficher les produits
include_once "vue/adherent/vueAdherentPanier.php";


?>
