<?php

class Professionnel {

  /*
  * Déclaration des attributs de la base de données liés
  * aux professionnels
  */
  private $idProf, $compte, $zoneG,
    $categProf, $nomDirigeant, $prenomDirigeant,
    $raisonSocial, $noSiret, $mail, $tel, $noRue,
    $cpostal, $ville, $pays, $login, $mdp,
    $lattitude, $longitude;



  private $prenium;

  /*
  * Constructeur
  */
  public function __construct()
  {
    $this->idProf = null;
    $this->compte = null; //new Compte();
    $this->zoneG = null; //new ZoneG();
    $this->categProf = new CategProf();
    $this->nomDirigeant = "";
    $this->prenomDirigeant = "";
    $this->raisonSocial = "";
    $this->noSiret = "";
    $this->mail = "";
    $this->tel = "";
    $this->noRue = "";
    $this->nomRue = "";
    $this->cpostal = "";
    $this->ville = "";
    $this->pays = "";
    $this->login = "";
    $this->mdp = "";
    $this->lattitude = 0;
    $this->longitude = 0;
  }

  /*
  * Renseigner un compte professionnel à l'inscription
  */
  public function renseigner($tab, $unC, $uneZ, $uneCateg)
  {
    $this->compte = $unC ; // 1 = professionnel, 3 = Prenium
    $this->zoneG = $uneZ;
    $this->categProf = $uneCateg;
    $this->nomDirigeant = $tab['nomDirigeant'];
    $this->prenomDirigeant = $tab['prenomDirigeant'];
    $this->raisonSocial = $tab['raisonSocial'];
    $this->noSiret = $tab['noSiret'];
    $this->mail = $tab['mail'];
    $this->tel = $tab['tel'];
    $this->noRue = $tab['noRue'];
    $this->nomRue = $tab['nomRue'];
    $this->cpostal = $tab['cpostal'];
    $this->ville = $tab['ville'];
    $this->pays = $tab['pays'];
    $this->login = $tab['login'];
    $this->mdp = $tab['mdp'];
    $this->lattitude = 0.0;//$tab['lattitude'];
    $this->longitude = 0.0;//$tab['longitude'];
    /* Prenium ou pas en fonction du choix */
    $this->prenium = ($this->compte->getIdCompte() == 1) ? false : true;
  }

  public function serialiser(){
    $tab = array(
      'idCompte' => $this->compte->getIdCompte(),
      'idZoneG' => $this->zoneG->getIdZoneG(),
      'idCategProf' => $this->categProf->getIdCategProf(),
      'nomDirigeant' => $this->nomDirigeant,
      'prenomDirigeant' => $this->prenomDirigeant,
      'raisonSocial' => $this->raisonSocial,
      'noSiret' => $this->noSiret,
      'mail' => $this->mail,
      'tel' => $this->tel,
      'noRue' => $this->noRue,
      'nomRue' => $this->nomRue,
      'cpostal' => $this->cpostal,
      'ville' => $this->ville,
      'pays' => $this->pays,
      'login' => $this->login,
      'mdp' => $this->mdp,
      'lattitude' => $this->lattitude,
      'longitude' => $this->longitude
    );
    return $tab;
  }

  public function getNomDirigeant() {
    return $this->nomDirigeant;
  }

  public function getPrenomDirigeant() {
    return $this->prenomDirigeant;
  }

}

?>
