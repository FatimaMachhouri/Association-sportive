
<?php

  require('../model/model.php');

    //on teste si la connexion est valide
    if ( empty($_COOKIE['identifiantCookie']) ) {
      header('Location: ../index.php');
      exit();
    }

    else {
      $seasons = getSeasons();
      $teams = getTeams();
      require('../view/seasonView.php');
    }
