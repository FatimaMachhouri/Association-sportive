
<?php

  require('../model/coachesModel.php');


  if ( empty($_COOKIE['identifiantCookie']) ) {
    //on teste si la connexion est toujours valide
    header('Location: ../index.php');
    exit();
  }

  else {
    if ( isset($_GET['idCoachUpdate']) ) {
      if(isset($_POST['nameCoachUp'])) {$updateCoach = updateCoachName($_GET['idCoachUpdate'], $_POST['nameCoachUp']);}
      if(isset($_POST['firstnameCoachUp'])) {$updateCoach = updateCoachFirstname($_GET['idCoachUpdate'], $_POST['firstnameCoachUp']); }
      if(isset($_POST['emailCoachUp'])) {$updateCoach = updateCoachMail($_GET['idCoachUpdate'], $_POST['emailCoachUp']); }
      if(isset($_POST['telCoachUp'])) {$updateCoach = updateCoachPhone($_GET['idCoachUpdate'], $_POST['telCoachUp']); }
    }

    if ( isset($_GET['idCoach']) ) {
      $deleteCoach = deleteCoach($_GET['idCoach']);
    }

    if ( isset($_POST['firstNameCoach']) && isset($_POST['nameCoach']) && isset($_POST['emailCoach']) && isset($_POST['phoneNumberCoach']) ) {
      $addCoach = insertCoach( $_POST['firstNameCoach'], $_POST['nameCoach'], $_POST['emailCoach'], $_POST['phoneNumberCoach'] );
    }

    $coachesSeason = getCoaches();

    require('../view/coachesView.php');
  }
