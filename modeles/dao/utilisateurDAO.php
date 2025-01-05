<?php 
class UtilisateurDAO {
    private static $db;


    public static function getUtilisateur(Utilisateur $utilisateur) {
        // Préparation de la requête pour récupérer l'utilisateur par email
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idUtilisateur, statut, prenomUtilisateur, nomUtilisateur,mail, mdp FROM utilisateurs WHERE mail = :mail");
        $mail = $utilisateur->getMail();
        $mdp = $utilisateur->getMdp();
        $requetePrepa->bindValue(":mail", $mail);
    
        // Exécution de la requête
        $requetePrepa->execute();
        
        // Récupération du résultat
        $resultat = $requetePrepa->fetch(PDO::FETCH_ASSOC);
    
        // Si l'utilisateur n'est pas trouvé ou si le mot de passe ne correspond pas
        if ($resultat === false || md5($mdp) !== $resultat['mdp']) {
            return false; // Connexion échouée
        }
    
        // Connexion réussie, retourne les informations de l'utilisateur
        return $resultat;
    }
    
    
    // Initialisation de la connexion à la base de données (en supposant que la connexion est faite ici)
    public static function init() {
        try {
            self::$db = new PDO("mysql:host=localhost;dbname=biorelais", "root", ""); // Remplace par tes paramètres
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }



   // Fonction pour ajouter un utilisateur dans la base de données
   public static function addUtilisateur($prenom, $nom, $mail, $mdpHash) {
    // Préparer la requête SQL pour insérer l'utilisateur
    $sql = "INSERT INTO `utilisateurs`(`mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) 
            VALUES (:mail, :mdp, :statut, :nomUtilisateur, :prenomUtilisateur)";
    
    try {
        // Préparation de la requête SQL
        $stmt = self::$db->prepare($sql);

        // Lier les paramètres avec les valeurs
        $statut = 'Adherent'; // Valeur fixe pour le statut
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', $mdpHash);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':nomUtilisateur', $nom);
        $stmt->bindParam(':prenomUtilisateur', $prenom);

        // Exécuter la requête
        $stmt->execute();
        
        echo "Utilisateur ajouté avec succès.";
        return true;
    } catch (PDOException $e) {
        // Afficher l'erreur si quelque chose ne va pas
        echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        return false;
    }
}
public static function updateUtilisateurConnecte($idUtilisateur, $prenomUtilisateur, $nomUtilisateur, $mail, $mdp) {
    // Connexion à la base de données
    $connexion = DBConnex::getInstance();

    // Requête de mise à jour
    $requete = $connexion->prepare("
        UPDATE utilisateurs 
        SET 
            prenomUtilisateur = :prenom, 
            nomUtilisateur = :nom, 
            mail = :mail, 
            mdp = :mdp
        WHERE idUtilisateur = :idUtilisateur
    ");

    // Bind des paramètres
    $requete->bindParam(':prenom', $prenomUtilisateur, PDO::PARAM_STR);
    $requete->bindParam(':nom', $nomUtilisateur, PDO::PARAM_STR);
    $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $mdp, PDO::PARAM_STR); // Hash du mot de passe
    $requete->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);

    // Exécution et retour du résultat
    return $requete->execute();
}

public static function supprimerUtilisateur($idUtilisateur) {
    $connexion = DBConnex::getInstance();

    try {
        $requete = "DELETE FROM utilisateurs WHERE idUtilisateur = :idUtilisateur";
        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
    
        return false;
    }
}




}
