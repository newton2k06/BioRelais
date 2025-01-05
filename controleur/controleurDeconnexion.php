<?php
$formulaireConnexion = new Formulaire('post', 'index.php', 'formConnexion', 'formConnexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identifiant :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('mail', 'mail', '', 1, 'Entrez votre identifiant', ''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));



$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

// Bouton de déconnexion (seulement visible si l'utilisateur est déjà connecté)
if (isset($_SESSION['identification']) && $_SESSION['identification'] ){
    //$_SESSION['identification']= false;
    $_SESSION["identification"]= [];
	$_SESSION['bioRelaisMP']=[];
  
    $_SESSION['bioRelaisAdherentMP']="visiteur";
    $_GET['bioRelaisAdherentMP']="visiteur";
    session_destroy();

}
/*
isset($_POST['deconnexion'])){
    $_SESSION["identification"]= [];
    $_SESSION['bioRelaisMP']="visiteur";

}*/


require_once 'vue/vueConnexion.php';
