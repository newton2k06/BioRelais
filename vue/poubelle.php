return DBConnex::getInstance()->lastInsertId(); 
<?php 

// On commence par récupérer tous les produits
$lesProduits = ProduitDAO::getAllProduits(); // Assurez-vous que cette méthode renvoie une liste de produits (sans doublon).

// Création d'un tableau pour stocker les données des produits à afficher
$tabProduits = [];
foreach ($lesProduits as $produit) {
    // Réinitialisation du tableau pour chaque produit
    $unProduit = [];

    // Ajouter un lien cliquable pour le nom du produit
    $unProduit[] = "<a href='index.php?produit=" . $produit->getIdProduit() . "'>" . $produit->getNomProduit() . "</a>";

    // Ajouter le descriptif du produit
    $unProduit[] = $produit->getDescriptifProduit();

    // Ajouter le producteur (vous devrez peut-être récupérer plus d'informations selon la structure de votre base de données)
    $unProduit[] = $produit->getIdProducteur(); // Vous pouvez utiliser le nom du producteur si vous avez les données associées

    // Ajouter la catégorie (même chose pour la catégorie)
    $unProduit[] = $produit->getIdCategorie(); // Vous pouvez aussi récupérer le nom de la catégorie si nécessaire

    // Ajouter des actions : modifier et supprimer
    $unProduit[] = "<a href='editProduit.php?id=" . $produit->getIdProduit() . "'>Modifier</a>";
    $unProduit[] = "<a href='deleteProduit.php?id=" . $produit->getIdProduit() . "'>Supprimer</a>";

    // Ajouter ce produit au tableau des produits
    $tabProduits[] = $unProduit;
}

// Maintenant, nous allons créer un tableau pour afficher les produits
$menuProduits = new Tableau("MenuProduit", $tabProduits);

// Titre des colonnes
$titreCols = ["ID Produit", "Nom", "Descriptif", "Producteur", "Catégorie", "Actions"];

// Définir les titres du tableau
$menuProduits->setTitreTab("Tous les produits");
$menuProduits->setTitreCol($titreCols);

// Créer le tableau HTML pour l'affichage
$tabProduitsLiens = $menuProduits->creerTableau();






include_once 'vue/adherent/vueAdherentProduit.php';
