<?php

  include '../controleur/controleur.php';
  include '../controleur/Client.class.php';
  include '../res/conf/conf.php';

  if(isset($_POST['login']) && isset($_POST['mdp'])) {
    $unControleur = new Controleur(DB_HOST, DB_NAME, DB_USER, DB_PASS, "");

    $where = array(
        'login' => $_POST['login'],
        'mdp'   => $_POST['mdp']
    );

    $res = $unControleur->connexion($where);

    if($res['idCompte'] == 2){
      // On instancie un client
      $unClient = new Client();
      foreach ($res as $key => $value) {
        $tab[$key] = $value;
      }
      $unClient->renseigner($tab);
      var_dump($unClient);
    }
  }

?>
