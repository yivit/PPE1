<?php

class Client {

  /*
  * Déclaration des attributs de la base de données liés
  * aux clients
  */
  private $idClient, $idCompte, $nom, $prenom,
    $mail, $tel, $noRue, $nomRue, $cpostal,
    $ville, $pays, $login, $mdp;

    /*
    * Constructeur
    */
    public function __construct()
    {
      $this->idClient = null;
      $this->idCompte = 2;    /* 2 = Client */
      $this->nom = "";
      $this->prenom = "";
      $this->mail = "";
      $this->tel = "";
      $this->noRue = "";
      $this->nomRue = "";
      $this->cpostal = "";
      $this->ville = "";
      $this->pays = "";
      $this->login = "";
      $this->mdp = "";
    }

    public function renseigner($tab)
    {
      $this->nom = $tab['nom'];
      $this->prenom = $tab['prenom'];
      $this->mail = $tab['mail'];
      $this->tel = $tab['tel'];
      $this->noRue = $tab['noRue'];
      $this->nomRue = $tab['nomRue'];
      $this->cpostal = $tab['cpostal'];
      $this->ville = $tab['ville'];
      $this->pays = $tab['pays'];
      $this->login = $tab['login'];
      $this->mdp = $tab['mdp'];
    }

    public function serialiser()
    {
      $tab = array(
        "idCompte" => $this->idCompte,
        "nom" => $this->nom,
        "prenom" => $this->prenom,
        "mail" => $this->mail,
        "tel" => $this->tel,
        "noRue" => $this->noRue,
        "nomRue" => $this->nomRue,
        "cpostal" => $this->cpostal,
        "ville" => $this->ville,
        "pays" => $this->pays,
        "login" => $this->login,
        "mdp" => $this->mdp
      );
      return $tab;
    }


    // Getter et Setter
    public function getIdClient(){
      return $this->idClient;
    }

    public function getIdCompte(){
      return $this->idCompte;
    }

    public function getNom(){
      return $this->nom;
    }

    public function getPrenom(){
      return $this->prenom;
    }

    public function getMail(){
      return $this->mail;
    }

    public function getTel(){
      return $this->tel;
    }

    public function getNoRue(){
      return $this->noRue;
    }

    public function getNomRue(){
      return $this->nomRue;
    }

    public function getCpostal(){
      return $this->cpostal;
    }

    public function getVille(){
      return $this->ville;
    }

    public function getPays(){
      return $this->pays;
    }

    public function getLogin(){
      return $this->login;
    }

    public function getMdp(){
      return $this->mdp;
    }
}


?>
