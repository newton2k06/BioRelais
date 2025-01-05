<?php
class Panier {
    private $idAdherent;
    private $produits = [];

    public function __construct($idAdherent) {
        $this->idAdherent = $idAdherent;
    }

    public function ajouterProduit(Produit $produit, $quantite) {
        $this->produits[] = [
            'produit' => $produit,
            'quantite' => $quantite
        ];
    }

    public function getProduits() {
        return $this->produits;
    }

    public function getIdAdherent() {
        return $this->idAdherent;
    }
}
