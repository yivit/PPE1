<?php

class ZoneG {

  private $idZoneG, $region, $arrondissement;

  public function __construct() {
    $this->idZoneG = null;
    $this->region = "";
    $this->arrondissement = "";
  }

  public function renseigner($idZoneG, $region, $arr) {
    $this->idZoneG = $idZoneG;
    $this->region = $region;
    $this->arrondissement = $arr;
  }

  public function toString() {
    return ($this->arrondissement != null) ?
          $this->arrondissement . ' ' . $this->region : $this->region;
  }

  //getter et Setter
  public function getIdZoneG() {
    return $this->idZoneG;
  }

  public function getRegion() {
    return $this->region;
  }

  public function getArrondissement() {
    return $this->arrondissement;
  }
}

?>
