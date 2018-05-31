
<?php

  require('../model/inscriptionModel.php');


    $currentSeason = getCurrentSeason();
    if ( isset($_POST['firstNameCoachInscri']) && isset($_POST['nameCoachInscr']) && isset($_POST['emailCoachInscr']) && isset($_POST['phoneNumberCoachInscr']) && isset($_POST['passwordInscr']) ) {
      $addCoach = inscription( $_POST['firstNameCoachInscri'], $_POST['nameCoachInscr'], $_POST['emailCoachInscr'], $_POST['phoneNumberCoachInscr'], $_POST['passwordInscr'] );
    }

    require('../view/inscriptionView.php');


    
