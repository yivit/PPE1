<?php

require_once '../res/conf/conf.php';
require_once '../controleur/controleurClient.php';
include '../controleur/Client.class.php';
require_once '../controleur/controleurProfessionnel.php';
include '../controleur/Professionnel.class.php';

include '../controleur/Compte.class.php';
include '../controleur/ZoneG.class.php';
include '../controleur/CategProf.class.php';


/* VALIDATION D'INSCRIPTION */

// var_dump($_GET['idC']);
// die();

$idC = (isset($_GET['idC'])) ? $_GET['idC'] : 0;

// var_dump($idC);
// die();

switch($idC)
{
  // Accès PROFESSIONNEL
  case "1" :
  $unControleur = new controleurProfessionnel(DB_HOST, DB_NAME, DB_USER, DB_PASS, "categProf");

  $unPro = new Professionnel();

  // selection du compte
  $compte = new Compte();
  $unControleur->getModele()->setTable("compte");
  $where = array(
      'idCompte' => $_POST['idCompte']
  );
  $res = $unControleur->selectAllWhere($where);
  $compte->renseigner($res['idCompte'], $res['libelle']);

  // selection d'une zone géographique
  $zone = new ZoneG();
  $unControleur->getModele()->setTable("zoneG");
  $where = array(
      'idZoneG' => $_POST['idZoneG']
  );
  $res = $unControleur->selectAllWhere($where);

  $zone->renseigner($res['idZoneG'], $res['region'], $res['arrondissement']);


  // selection d'une catégorie professionnelle
  $categ = new CategProf();
  $unControleur->getModele()->setTable("categProf");
  $where = array(
      'idCategProf' => $_POST['idCategProf']
  );
  $res = $unControleur->selectAllWhere($where);
  $categ->renseigner($res['idCategProf'], $res['libelle']);

  $unPro->renseigner($_POST, $compte, $zone, $categ);

  $unControleur->getModele()->setTable("professionnel");

  $unControleur->insert($unPro);

  header('Location: ../index.php?idC=' . $idC .'&nom=' . $unPro->getNomDirigeant() . '&prenom=' . $unPro->getPrenomDirigeant());

  break;

  // Accés CLIENT
  case "2" :
    $unControleur = new ControleurClient(DB_HOST, DB_NAME, DB_USER, DB_PASS, "client");

    $unClient = new Client();

    $unClient->renseigner($_POST);

    $unControleur->insert($unClient);

    header('Location: ../index.php?idC=' . $idC .'&nom=' . $unClient->getNom() . '&prenom=' . $unClient->getPrenom());

    break;
}



?>
