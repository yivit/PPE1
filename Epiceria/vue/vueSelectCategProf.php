<?php

  include '../controleur/CategProf.class.php';

  echo '<br/><div class="combo">
          <select name="idCategProf" style="width:170px">';

  foreach ($res as $row) {
    $categProf = new CategProf();
    $categProf->renseigner($row['idCategProf'], $row['libelle']);


        echo '<option value="' . $categProf->getIdCategProf() . '">' . $categProf->toString() . '
              </option>';

  }

  echo '  </select>
        </div>';
        

?>
