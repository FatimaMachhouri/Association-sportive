
<?php

  require('../model/coachesModel.php');


  if ( empty($_COOKIE['identifiantCookie']) ) {
    //on teste si la connexion est toujours valide
    header('Location: ../index.php');
    exit();
  }

  else {
    if ( isset($_GET['idCoachUpdate']) ) {
      $updateCoach = setAdmin($_GET['idCoachUpdate']);
    }

    if ( isset($_GET['idCoach']) ) {
      $deleteCoach = deleteCoach($_GET['idCoach']);
    }

    if ( isset($_POST['firstnameCoach']) && isset($_POST['nameCoach']) && isset($_POST['emailCoach']) && isset($_POST['phoneNumberCoach']) ) {
      $addCoach = insertCoach( $_POST['firstnameCoach'], $_POST['nameCoach'], $_POST['emailCoach'], $_POST['phoneNumberCoach'] );
    }

    $coachesSeason = getCoaches();

    require('../view/coachesView.php');
  }
