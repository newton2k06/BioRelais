<?php
// Récupérer tous les produits de la base de données
$lesProduits = ProduitDAO::getAllProduits();

// Tableau pour stocker les produits à afficher
$tabProduits = [];
foreach ($lesProduits as $produit) {
    $unProduit = [];

    // Ajouter les informations de chaque produit
    $unProduit[] = $produit->getIdProduit(); // ID du produit
    $unProduit[] = "<img src='images/" . $produit->getPhotoProduit() . "' alt='" . $produit->getNomProduit() . "' width='100' />";
    $unProduit[] = $produit->getNomProduit(); // Nom
    $unProduit[] = $produit->getDescriptifProduit(); // Descriptif
    $unProduit[] = $produit->getIdProducteur(); // Producteur
    $unProduit[] = $produit->getIdCategorie(); // Catégorie
    $unProduit[] = $produit->getPrix(); // Ajouter le prix

    // Ajouter les actions selon que le produit est dans le panier ou non
    if (isset($_SESSION['panier'][$produit->getIdProduit()])) {
        $unProduit[] = "<a href='index.php?action=retraitPanier&idProduit=" . $produit->getIdProduit() . "'>Retirer du panier</a>";
    } else {
        $unProduit[] = "<a href='index.php?action=ajouterPanier&idProduit=" . $produit->getIdProduit() . "'>Ajouter au panier</a>";
    }

    $tabProduits[] = $unProduit;
}


// Gestion des actions : Ajouter au panier
// Gestion des actions : Ajouter au panier
if (isset($_GET['action']) && $_GET['action'] == 'ajouterPanier' && isset($_GET['idProduit'])) {
    $idProduit = $_GET['idProduit'];

    // Vérifier si le produit existe dans la base de données
    $produit = ProduitDAO::getProduitById($idProduit);
    if ($produit) {
        // Ajouter au panier
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // Vérifier si le produit est déjà dans le panier
        if (!isset($_SESSION['panier'][$idProduit])) {
            // Si le produit n'est pas encore dans le panier, on l'ajoute
            $_SESSION['panier'][$idProduit] = [
                'id' => $produit->getIdProduit(),
                'nom' => $produit->getNomProduit(),
                'quantite' => 1,  // On ajoute une unité du produit
                'prix' => $produit->getPrix()  // On ajoute le prix du produit
            ];
        } else {
            // Si le produit est déjà dans le panier, on incrémente la quantité
            $_SESSION['panier'][$idProduit]['quantite']++;
        }
    }

    // Rediriger vers la page principale après l'ajout
    header('Location: index.php');
    exit();
}



// Gestion des actions : Retirer du panier
if (isset($_GET['action']) && $_GET['action'] == 'retraitPanier' && isset($_GET['idProduit'])) {
    $idProduit = $_GET['idProduit'];

    // Vérifier si le produit existe dans le panier
    if (isset($_SESSION['panier'][$idProduit])) {
        // Retirer le produit du panier
        unset($_SESSION['panier'][$idProduit]);
    }

    // Rediriger vers la page principale après le retrait
    header('Location: index.php');
    exit();
}







// Inclure la vue pour afficher les produits
include_once "vue/adherent/vueAdherentAchat.php";
?>
