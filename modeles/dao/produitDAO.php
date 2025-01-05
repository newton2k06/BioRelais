<?php
class ProduitDAO {

// Ajouter un produit
public static function ajouterProduit(Produit $produitDTO) {
    $requete = DBConnex::getInstance()->prepare("INSERT INTO produits (nomProduit, descriptifProduit, photoProduit, idProducteur, idCategorie, prix) 
                                               VALUES (:nom, :descriptif, :photo, :idProducteur, :idCategorie, :prix)");

    $requete->bindValue(":nom", $produitDTO->getNomProduit());
    $requete->bindValue(":descriptif", $produitDTO->getDescriptifProduit());
    $requete->bindValue(":photo", $produitDTO->getPhotoProduit());
    $requete->bindValue(":idProducteur", $produitDTO->getIdProducteur());
    $requete->bindValue(":idCategorie", $produitDTO->getIdCategorie());
    $requete->bindValue(":prix", $produitDTO->getPrix()); // Ajout du prix

    try {
        $requete->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Erreur d'insertion produit : " . $e->getMessage());
        return false;
    }
}

// Récupérer tous les produits
public static function getAllProduits() {
    $requete = DBConnex::getInstance()->prepare("SELECT * FROM produits");
    $requete->execute();
    $produits = [];
    
    while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        // Convertir idProducteur et idCategorie en entiers ou null
        $idProducteur = isset($row['idProducteur']) && $row['idProducteur'] !== '' ? (int) $row['idProducteur'] : null;
        $idCategorie = isset($row['idCategorie']) && $row['idCategorie'] !== '' ? (int) $row['idCategorie'] : null;
        
        // Ajouter le prix récupéré
        $prix = isset($row['prix']) ? $row['prix'] : null;

        // Créer un objet Produit avec les valeurs correctement typées
        $produits[] = new Produit(
            (int) $row['idProduit'],      // idProduit doit être un entier
            $row['nomProduit'],
            $row['descriptifProduit'],
            $row['photoProduit'],
            $idProducteur,                // idProducteur maintenant un entier ou null
            $idCategorie,                 // idCategorie maintenant un entier ou null
            $prix                         // Ajout du prix
        );
    }

    return $produits;
}

// Récupérer un produit par son ID
public static function getProduitById($idProduit) {
    // Requête avec jointure pour récupérer les informations du produit et son prix
    $requete = DBConnex::getInstance()->prepare(
        "SELECT p.idProduit, p.nomProduit, p.descriptifProduit, p.photoProduit, p.idProducteur, p.idCategorie, p.prix
        FROM produits p
        WHERE p.idProduit = :idProduit"
    );
    $requete->bindValue(":idProduit", $idProduit);
    $requete->execute();

    if ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        // Crée un objet Produit en incluant le prix récupéré
        return new Produit(
            $row['idProduit'],
            $row['nomProduit'],
            $row['descriptifProduit'],
            $row['photoProduit'],
            $row['idProducteur'],
            $row['idCategorie'],
            $row['prix'] // Ajouter le prix comme paramètre dans le constructeur
        );
    }

    return null;
}

// Mettre à jour un produit
public static function updateProduit(Produit $produitDTO) {
    $requete = DBConnex::getInstance()->prepare("UPDATE produits SET 
                                                  nomProduit = :nom, 
                                                  descriptifProduit = :descriptif, 
                                                  photoProduit = :photo, 
                                                  idProducteur = :idProducteur, 
                                                  idCategorie = :idCategorie, 
                                                  prix = :prix
                                              WHERE idProduit = :idProduit");

    $requete->bindValue(":idProduit", $produitDTO->getIdProduit());
    $requete->bindValue(":nom", $produitDTO->getNomProduit());
    $requete->bindValue(":descriptif", $produitDTO->getDescriptifProduit());
    $requete->bindValue(":photo", $produitDTO->getPhotoProduit());
    $requete->bindValue(":idProducteur", $produitDTO->getIdProducteur());
    $requete->bindValue(":idCategorie", $produitDTO->getIdCategorie());
    $requete->bindValue(":prix", $produitDTO->getPrix()); // Ajout du prix

    try {
        $requete->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Erreur de mise à jour produit : " . $e->getMessage());
        return false;
    }
}

// Supprimer un produit
public static function supprimerProduit($idProduit) {
    $requete = DBConnex::getInstance()->prepare("DELETE FROM produits WHERE idProduit = :idProduit");
    $requete->bindValue(":idProduit", $idProduit);

    try {
        $requete->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Erreur de suppression produit : " . $e->getMessage());
        return false;
    }
}
}
