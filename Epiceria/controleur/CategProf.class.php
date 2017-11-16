<?php

class CategProf {

  private $idCategProf, $libelle;

  public function __construct() {
    $this->idCategProf = null;
    $this->libelle = "";
  }

  public function renseigner($idCategProf, $libelle) {
    $this->idCategProf = $idCategProf;
    $this->libelle = $libelle;
  }

  public function toString() {
    return $this->libelle;
  }

  //getter et Setter
  public function getIdCategProf() {
    return $this->idCategProf;
  }

  public function getLibelle() {
    return $this->libelle;
  }

}

?>
