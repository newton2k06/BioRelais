<?php
class PanierDAO {

    // Ajouter un produit au panier
    public static function ajouterProduitPanier($idAdherent, Produit $produitDTO, $quantite) {
        $requete = DBConnex::getInstance()->prepare("INSERT INTO lignescommande (idAdherent, idProduit, quantite) 
                                                       VALUES (:idAdherent, :idProduit, :quantite)");
        
        $requete->bindValue(":idAdherent", $idAdherent);
        $requete->bindValue(":idProduit", $produitDTO->getIdProduit());
        $requete->bindValue(":quantite", $quantite);

        try {
            $requete->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Erreur d'ajout au panier : " . $e->getMessage());
            return false;
        }
    }

    // Enregistrer la commande depuis le panier
    public static function enregistrerCommande(Panier $panierDTO) {
        $requeteCommande = DBConnex::getInstance()->prepare("INSERT INTO commandes (idAdherent, dateCommande) 
                                                             VALUES (:idAdherent, NOW())");
        
        $requeteCommande->bindValue(":idAdherent", $panierDTO->getIdAdherent());
        $requeteCommande->execute();
        $idCommande = DBConnex::getInstance()->lastInsertId();

        // Ajouter les lignes de commande
        foreach ($panierDTO->getProduits() as $item) {
            $requeteLigne = DBConnex::getInstance()->prepare("INSERT INTO lignescommande (idCommande, idProduit, quantite) 
                                                              VALUES (:idCommande, :idProduit, :quantite)");
            $requeteLigne->bindValue(":idCommande", $idCommande);
            $requeteLigne->bindValue(":idProduit", $item['produit']->getIdProduit());
            $requeteLigne->bindValue(":quantite", $item['quantite']);
            $requeteLigne->execute();
        }
    }
}
