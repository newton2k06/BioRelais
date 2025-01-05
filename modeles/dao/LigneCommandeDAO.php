<?php

// Vérifiez que ce fichier contient la classe LigneCommandeDAO
class LigneCommandeDAO {
    
    // Méthode pour ajouter une ligne de commande
    public static function ajouterLigneCommande($idUtilisateur, $idProduit, $quantite) {
        try {
            // Connexion à la base de données via PDO
            $db = DBconnex::getInstance(); // Supposons que vous ayez une classe DB pour gérer la connexion à la base de données
            
            // Préparer la requête SQL
            $sql = "INSERT INTO lignescommande (idUtilisateur, idProduit, quantite) 
                    VALUES (:idUtilisateur, :idProduit, :quantite)";
            
            // Préparer l'exécution de la requête
            $stmt = $db->prepare($sql);
            
            // Lier les paramètres
            $stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
            $stmt->bindParam(':idProduit', $idProduit, PDO::PARAM_INT);
            $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            
            // Exécuter la requête
            $stmt->execute();
            
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de l'ajout de la ligne de commande : " . $e->getMessage();
        }
    }
}

?>
