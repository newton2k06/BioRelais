<?php
class Categorie {
    private ?int $idCategorie;
    private ?string $nomCategorie;

    public function __construct($nomCategorie) {
        $this->nomCategorie = $nomCategorie;
    }

    public function getIdCategorie() {
        return $this->idCategorie;
    }

    public function getNomCategorie() {
        return $this->nomCategorie;
    }

    public function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }

    public function setNomCategorie($nomCategorie) {
        $this->nomCategorie = $nomCategorie;
    }
}
?>
