<?php

  include '../controleur/ZoneG.class.php';

  echo '<br/><div class="combo">
          <select name="idZoneG" style="width:170px">';

  foreach ($res as $row) {
    $zone = new ZoneG();
    $zone->renseigner($row['idZoneG'], $row['region'], $row['arrondissement']);

        echo '<option value="' . $zone->getIdZoneG() . '">' . $zone->toString() . '
              </option>';

  }

  echo '  </select>
        </div>';

?>
