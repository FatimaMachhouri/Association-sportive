
<?php

  require('../model/teamModel.php');

  if ( empty($_COOKIE['identifiantCookie']) ) {
    //on redirige vers le controller qui fera le traitement
    header('Location: ../index.php');
    exit();
  }

  else {
    if (isset($_GET['idTeam']) && ($_GET['idTeam']) > 0) {
      $team = getTeam($_GET['idTeam']);
      $licences = getLicencesTeam($_GET['idTeam']);

      $licenceToAdd = getLicencesToAdd($_GET['idTeam'], $_GET['idTeam']);

      require('../view/teamView.php');
    }
    
  }
