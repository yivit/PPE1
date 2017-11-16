<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../res/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../res/css/styleInscription.css">
    <title>Connexion</title>
  </head>

  <body>
    <div id="container">

      <div class="row justify-content-center" style="text-align:center">
        <div class="col-2">
          <input class="selected" type="submit" value="Je suis un particulier">
        </div>
        <div class="col-2">
          <form method="post" action="./inscriptionProfessionnel.php">
            <input class="not-selected" type="submit" value="Je suis un professionnel">
          </form>
        </div>
      </div>

      <br />
      <br />

        <div class="row justify-content-around">
          <div class="col-4 align-self-center">
            <form id="form_inscription" method="post" action="validationInscription.php?idC=2" style="text-align:center">
              <input type="text" name="login" placeholder="Login" required><br/><br/>
              <input type="password" name="mdp" placeholder="Mot de passe" required>
              <input type="password" name="confmdp" placeholder="Confirmation" required><br/><br/>
              <input type="text" name="nom" placeholder="Votre nom" required><br/><br/>
              <input type="text" name="prenom" placeholder="Votre prénom" required><br/><br/>
              <input type="mail" name="mail" placeholder="Votre e-mail" required><br/><br/>
              <input type="text" name="tel" placeholder="Votre téléphone" required><br/><br/>
              <input type="text" name="noRue" placeholder="n°" style="width:60px" required>
              <input type="text" name="nomRue" placeholder="Voie" required><br/><br/>
              <!-- <input type="text" name="cpostal" placeholder="Code postal" style="width:95px" required><br/><br/> -->
              <div class="combo"><select name="ville"><option value="Paris">Paris</option></select></div><br/>
              <div class="combo"><select name="pays"><option value="France">France</option></select></div><br/>
              <div class="combo"><select name="cpostal">

                <?php for ($i=1; $i < 10; $i++) {
                  echo '<option value="7500' . $i . '">7500' . $i . '</option>';
                } ?>

                <?php for ($i=10; $i <= 20; $i++) {
                  echo '<option value="750' . $i . '">750' . $i . '</option>';
                } ?>

              </select></div>


              <br/>
              <!-- Validation de la fiche d'inscription -->
              <input id="validationInscription" type="submit" name="valider" value="Valider">
            </form>
          </div>
        </div>

      </div>

  </body>
</html>
