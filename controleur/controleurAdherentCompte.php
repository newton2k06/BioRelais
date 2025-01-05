<?php

// Vérifier si un utilisateur est connecté
if (!isset($_SESSION['identification']) || !$_SESSION['identification']) {
    header('Location: index.php'); // Rediriger vers la page de connexion si non connecté
    exit();
}

if (isset($_SESSION['identification'])) {
    
   // var_dump($_SESSION['identification']); // Vérifiez le contenu pour vous assurer que "mail" est bien présent
} else {
    echo "Aucun utilisateur connecté.";
}

// Récupérer l'utilisateur connecté
$utilisateurConnecte = $_SESSION['identification'];

// Afficher les détails actuels de l'utilisateur
$formulaireUtilisateur = new Formulaire('post', 'index.php', 'formUtilisateur', 'formUtilisateur');

// Champ pour le prénom
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerLabel('Prénom :')
);
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputTexte(
        'prenom', 
        'prenom', 
        $utilisateurConnecte['prenomUtilisateur'], // Pré-remplir avec le prénom
        1, 
        '', 
        ''
    )
);
$formulaireUtilisateur->ajouterComposantTab();

// Champ pour le nom
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerLabel('Nom :')
);
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputTexte(
        'nom', 
        'nom', 
        $utilisateurConnecte['nomUtilisateur'], // Pré-remplir avec le nom
        1, 
        '', 
        ''
    )
);
$formulaireUtilisateur->ajouterComposantTab();
// Champ pour le statut
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerLabel('Statut :')
);
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputTexte(
        'statut', 
        'statut', 
        $utilisateurConnecte['statut'], // Pré-remplir avec le statut
        1, 
        '', 
        ''
    )
);
$formulaireUtilisateur->ajouterComposantTab();


// Champ pour l'email
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerLabel('Email :')
);
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputTexte( 'mail','mail', 
 $utilisateurConnecte['mail'], // Pré-remplir avec l'email
 1, 'Entrez votre adresse e-mail',  '' )
);
$formulaireUtilisateur->ajouterComposantTab();

// Champ pour le mot de passe
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerLabel('Mot de Passe :')
);
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputMdp(
        'mdp', 
        'mdp', 
        1, 
        'Entrez un nouveau mot de passe', 
        ''
    )
);
$formulaireUtilisateur->ajouterComposantTab();

// Bouton de validation
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputSubmit('submitModif', 'submitModif', 'Valider')
);
$formulaireUtilisateur->ajouterComposantTab();
// Bouton de vsuppression
$formulaireUtilisateur->ajouterComposantLigne(
    $formulaireUtilisateur->creerInputSubmit('supprimerCompte', 'supprimerCompte', 'supprimer Compte')
);
$formulaireUtilisateur->ajouterComposantTab();
// Créer le formulaire
$formulaireUtilisateur->creerFormulaire();



/*****************************************************************************************************
 * Traitement du formulaire : Mise à jour des informations de l'utilisateur connecté
 *****************************************************************************************************/
if (isset($_POST['submitModif'])) {
    // Récupérer les nouvelles valeurs du formulaire
    $nouveauPrenom = $_POST['prenom'];
    $nouveauNom = $_POST['nom'];
    $nouveauMail = $_POST['mail'];
    $nouveauMdp = $_POST['mdp'];

    // Appeler la méthode DAO pour mettre à jour les données en base
    $resultat = UtilisateurDAO::updateUtilisateurConnecte(
        $utilisateurConnecte['idUtilisateur'], 
        $nouveauPrenom, 
        $nouveauNom, 
        $nouveauMail, 
        $nouveauMdp
    );

    if ($resultat) {
        $message = "Vos informations ont été mises à jour avec succès.";

        // Mettre à jour les informations dans $_SESSION
        $_SESSION['identification']['prenom'] = $nouveauPrenom;
        $_SESSION['identification']['nom'] = $nouveauNom;
        $_SESSION['identification']['mail'] = $nouveauMail;
    } else {
        $message = "Une erreur est survenue lors de la mise à jour.";
    }
}
if (isset($_POST['supprimerCompte'])) {
    $idUtilisateur = $_SESSION['identification']['idUtilisateur'];

    // Supprimer l'utilisateur de la base de données
    $resultatSuppression = UtilisateurDAO::supprimerUtilisateur($idUtilisateur);

    if ($resultatSuppression) {
        // Déconnecter l'utilisateur après la suppression
        session_destroy();
        header('Location: index.php'); // Rediriger vers la page d'accueil
        exit();
    } else {
        $messageErreurSuppression = "Erreur lors de la suppression de votre compte. Veuillez réessayer.";
    }
}


/*****************************************************************************************************
 * Inclure la vue pour afficher les informations
 *****************************************************************************************************/
include_once "vue/adherent/vueAdherentCompte.php";

?>
