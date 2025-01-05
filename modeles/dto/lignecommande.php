<?php
class LigneCommandeDTO {
    private $idUtilisateur;
    private $idProduit;
    private $quantite;

    // Constructeur pour initialiser les propriétés
    public function __construct($idUtilisateur, $idProduit, $quantite) {
        $this->idUtilisateur = $idUtilisateur;
        $this->idProduit = $idProduit;
        $this->quantite = $quantite;
    }

    // Getters et setters (facultatifs selon l'utilisation)
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getQuantite() {
        return $this->quantite;
    }
}
