<?php

if(isset($_GET['bioRelaisAdherentMP'])){
	$_SESSION['bioRelaisAdherentMP']= $_GET['bioRelaisAdherentMP'];
}
else
{
	if(!isset($_SESSION['bioRelaisAdherentMP'])){
		$_SESSION['bioRelaisAdherentMP']="adherentAchat";
	}
	
}



$bioRelaisAdherentMP = new Menu("bioRelaisAdherentMP");


$bioRelaisAdherentMP->ajouterComposant($bioRelaisAdherentMP->creerItemLien("adherentAchat", "achat"));
$bioRelaisAdherentMP->ajouterComposant($bioRelaisAdherentMP->creerItemLien("adherentPanier", "Panier"));
$bioRelaisAdherentMP->ajouterComposant($bioRelaisAdherentMP->creerItemLien("adherentFacture", "facture"));
$bioRelaisAdherentMP->ajouterComposant($bioRelaisAdherentMP->creerItemLien("adherentCompte", "mon compte"));
$bioRelaisAdherentMP->ajouterComposant($bioRelaisAdherentMP->creerItemLien("deconnexion", "Se deconnecter"));


$menubioRelaisAdherentMP = $bioRelaisAdherentMP->creerMenu($_SESSION['bioRelaisAdherentMP'],'bioRelaisAdherentMP');


include_once dispatcher::dispatch($_SESSION['bioRelaisAdherentMP']);