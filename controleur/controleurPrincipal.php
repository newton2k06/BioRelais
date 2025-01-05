<?php
if(isset($_GET['bioRelaisMP'])){
	$_SESSION['bioRelaisMP']= $_GET['bioRelaisMP'];
}
else
{
	if(!isset($_SESSION['bioRelaisMP'])){
		$_SESSION['bioRelaisMP']="visiteur";
	}
	
}

//Tester la connexion 

$messageErreurConnexion = "";
if(isset($_POST['submitConnex'])){
	
	$_SESSION['identification'] = UtilisateurDAO::getUtilisateur(new Utilisateur($_POST['mail'],$_POST['mdp']));



	if(!$_SESSION['identification']){
		$_SESSION['bioRelaisMP']="connexion";
		$messageErreurConnexion = "Identifiant ou mot de passe incorrect.";
	}
	else{
		$_SESSION['bioRelaisMP']=$_SESSION['identification']['statut'];
	}
}

/*
elseif (isset($_POST['deconnexion'])){
		$_SESSION["identification"]= [];
		$_SESSION['bioRelaisMP']="visiteur";
	
}
*/





$bioRelaisMP = new Menu("bioRelaisMP");


$bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("Connexion", "Se connecter"));
$bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("Inscription", "S inscrire"));

$menuPrincipalBioRelais = $bioRelaisMP->creerMenu($_SESSION['bioRelaisMP'],'bioRelaisMP');

include_once dispatcher::dispatch($_SESSION['bioRelaisMP']);


