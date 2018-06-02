
<?php

  require('../model/teamModel.php');

  if ( empty($_COOKIE['identifiantCookie']) ) {
    //cookie qui a expiré
    header('Location: ../index.php');
    exit();
  }

  else {
    
    if ( isset($_GET['idTeamDelete']) ) {
      $teamDelete = deleteTeam( $_GET['idTeamDelete'] );
      header('Location: categories.php');
      exit();
    }

    if (isset($_GET['idTeam']) && ($_GET['idTeam']) > 0) {

      $team = getTeam($_GET['idTeam']);
      $licences = getLicencesTeam($_GET['idTeam']);

      require('../view/teamView.php');
    }

  }
