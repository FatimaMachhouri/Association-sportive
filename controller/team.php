
<?php

  require('../model/teamModel.php');

  $currentSeason = getCurrentSeason();
  if (isset($_GET['idTeam']) && ($_GET['idTeam']) > 0) {
    $team = getTeam($_GET['idTeam']);
    $licences = getLicencesTeam($_GET['idTeam']);

    $licenceToAdd = getLicencesToAdd($_GET['idTeam'], $_GET['idTeam']);

    require('../view/teamView.php');
  }

  else {
    echo 'ERREUR PAS D\'EQUIPE POUR CETTE DONNEE';
  }
