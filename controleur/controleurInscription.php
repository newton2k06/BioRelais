<?php

//if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
	// Vérifier si le formulaire a été soumis
// Initialiser la connexion à la base de données
UtilisateurDAO::init();

// Validation des données du formulaire
if (isset($_POST['submitInscription'])) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdpConfirm = $_POST['mdpConfirm'];

    $messageErreurInscription = "";

    // Validation des champs
    if (empty($prenom) || empty($nom) || empty($mail) || empty($mdp) || empty($mdpConfirm)) {
        $messageErreurInscription = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $messageErreurInscription = "L'email n'est pas valide.";
    } elseif ($mdp !== $mdpConfirm) {
        $messageErreurInscription = "Les mots de passe ne correspondent pas.";
    } else {
        // Si tout est valide, hachage du mot de passe avec MD5
        $mdpHash = md5($mdp);

        // Appeler la méthode addUtilisateur pour ajouter l'utilisateur
        if (UtilisateurDAO::addUtilisateur($prenom, $nom, $mail, $mdpHash)) {
            $messageErreurInscription = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        } else {
            $messageErreurInscription = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}

	$formulaireInscription = new Formulaire('post', 'index.php', 'formInscription', 'formInscription');
	

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Prénom :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '', 1, 'Entrez votre prénom', ''));
	$formulaireInscription->ajouterComposantTab();
	

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Nom :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom', 'nom', '', 1, 'Entrez votre nom', ''));
	$formulaireInscription->ajouterComposantTab();


	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Email :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('mail', 'mail', '', 1, 'Entrez votre email', ''));
	$formulaireInscription->ajouterComposantTab();

	
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Mot de Passe :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp', 'mdp', 1, 'Entrez votre mot de passe', ''));
	$formulaireInscription->ajouterComposantTab();


	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Confirmer le mot de passe :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdpConfirm', 'mdpConfirm', 1, 'Confirmez votre mot de passe', ''));
	$formulaireInscription->ajouterComposantTab();


	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('submitInscription', 'submitInscription', 'S inscrire'));
	$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription-> creerInputSubmit('deconnexion', 'deconnexion', 'Annuler'));
	$formulaireInscription->ajouterComposantTab();

	if(isset($messageErreurInscription)){
		$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerMessage($messageErreurInscription));
		$formulaireInscription->ajouterComposantTab();
	}

	
	// Création du formulaire
	$formulaireInscription->creerFormulaire();

	require_once 'vue/vueInscription.php' ;
/*}
else{
	$_SESSION['identification'] = [];
	$_SESSION['bioRelais'] = "accueil";
	header('location: index.php');
}*/

?>
