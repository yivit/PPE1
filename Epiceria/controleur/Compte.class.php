<?php

class Compte {

  private $idCompte, $libelle;

  public function __construct()
  {
    $this->idCompte = null;
    $this->libelle = "";
  }

  public function renseigner($idC, $lib) {
    $this->idCompte = $idC;
    $this->libelle = $lib;
  }

  public function getIdCompte() {
    return $this->idCompte;
  }

  public function getLibelle() {
    return $this->libelle;
  }

}

?>
