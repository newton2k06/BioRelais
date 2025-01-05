<?php
class CommandeDAO {
    public static function ajouterCommande($commande) {
        $db = DBConnex::getInstance();

        // Préparer la requête SQL
        $sql = "INSERT INTO commandes (dateCommande, idAdherent) 
                VALUES (:dateCommande, :idAdherent)";
        $stmt = $db->prepare($sql);

        // Lier les paramètres
        $stmt->bindParam(':dateCommande', $commande['dateCommande'], PDO::PARAM_STR);
        $stmt->bindParam(':idAdherent', $commande['idAdherent'], PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();

        // Retourner l'idCommande généré
        return $db->lastInsertId();
    }
}

