<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./res/css/bootstrap-grid.css">
    <link rel="stylesheet" href="./res/css/style.css">

    <!-- Insert des bibliothèques -->

    <script type="text/javascript" src="./res/libs/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./res/libs/alert/alert.jquery.min.js"></script>
    <link rel="stylesheet" href="./res/libs/alert/alert.css">

    </script>

    <title>Connexion</title>
  </head>

  <body>
    <div id="container">

      <div class="row justify-content-around">
        <div class="col-4 align-self-center" style="text-align:center">
          <form method="post" action="vue/inscriptionClient.php">
            <input id="inscription" type="submit" name="inscription" value="Je veux m'inscrire tout de suite !" style="width:100%">
          </form>
        </div>
      </div>
      <br />
        <div class="row justify-content-around">
          <div class="col-4 align-self-center">
            <form id="form_identification" method="post" action="./action/connexion.php" style="text-align:center">

              <label><input type="radio" name="professionnel" value="1" />Professionnel</label>
              <label><input type="radio" name="client" value="2" />Particulier</label><br/><br/>

              <input type="text" name="login" placeholder="Login"><br/><br/>
              <input type="password" name="mdp" placeholder="Mot de passe"><br/>
              <input type="submit" name="connexion" value="Se connecter">
            </form>
          </div>
        </div>
      </div>

      <?php

      $idC = (isset($_GET['idC'])) ? $_GET['idC'] : 0;

      switch($idC)
      {

        case "1" :

          break;

        case "2" :

          break;
      }


      ?>

  </body>
</html>
