<?php


class Produit {
    private ?int $idProduit;
    private ?string $nomProduit;
    private ?string $descriptifProduit;
    private ?string $photoProduit;
    
    private ?int $idProducteur;
    private ?int $idCategorie;
    private $prix; // Ajout du prix

   
    public function __construct(
        ?int $idProduit = null, // On accepte un ID optionnel
        string $nomProduit, 
        string $descriptifProduit, 
        string $photoProduit, 
        ?int $idProducteur, 
        ?int $idCategorie,
        $prix
    ) {
        $this->idProduit = $idProduit; // Le cas échéant, l'ID sera initialisé à null
        $this->nomProduit = $nomProduit;
        $this->descriptifProduit = $descriptifProduit;
        $this->photoProduit = $photoProduit;
        $this->idProducteur = $idProducteur;
        $this->idCategorie = $idCategorie;
        $this->prix = $prix;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getNomProduit() {
        return $this->nomProduit;
    }

    public function getDescriptifProduit() {
        return $this->descriptifProduit;
    }

    public function getPhotoProduit() {
        return $this->photoProduit;
    }

    public function getIdProducteur() {
        return $this->idProducteur;
    }

    public function getIdCategorie() {
        return $this->idCategorie;
    }
    public function setPrixProduit($prix) {
         $this->prix =$prix;
    }

    public function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    public function setNomProduit($nomProduit) {
        $this->nomProduit = $nomProduit;
    }

    public function setDescriptifProduit($descriptifProduit) {
        $this->descriptifProduit = $descriptifProduit;
    }

    public function setPhotoProduit($photoProduit) {
        $this->photoProduit = $photoProduit;
    }

    public function setIdProducteur($idProducteur) {
        $this->idProducteur = $idProducteur;
    }

    public function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }
}
?>
