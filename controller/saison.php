
<?php

  require('../model/model.php');

    if ( empty($_COOKIE['identifiantCookie']) ) {
      //on redirige vers le controller qui fera le traitement
      header('Location: ../index.php');
      exit();
    }
    else {
      $seasons = getSeasons();
      $teams = getTeams();
      require('../view/seasonView.php');
    }
