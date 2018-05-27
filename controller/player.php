
<?php

  require('../model/playerModel.php');

  $currentSeason = getCurrentSeason();
  if (isset($_GET['idPlayer']) && ($_GET['idPlayer']) > 0) {
    $player = getPlayer($_GET['idPlayer']);
    $playerLicences = getLicencesPlayer($_GET['idPlayer']);
  require('../view/playerView.php');
  }

  else {
    echo 'ERREUR, PAS DE JOUEUR POUR CETTE DONNEE';
  }
