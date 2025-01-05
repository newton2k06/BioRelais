<?php
class Utilisateur {
use Hydrate;

    private $idUtilisateur;
    private $mail;
    private $mdp;
    private $statut;
    private $nomUtilisateur;
    private $prenomUtilisateur;
   
    // Constructeur
    public function __construct($mail, $mdp, $statut = null, $nomUtilisateur = null, $prenomUtilisateur = null, $idAdherent = null, $idProducteur = null) {
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->statut = $statut;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->idAdherent = $idAdherent;
        $this->idProducteur = $idProducteur;
    }

    // Getters and Setters
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function getNom() {
        return $this->nomUtilisateur;
    }

    public function setNom($nomUtilisateur) {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    public function getPrenom() {
        return $this->prenomUtilisateur;
    }

    public function setPrenom($prenomUtilisateur) {
        $this->prenomUtilisateur = $prenomUtilisateur;
    }

    
}
