
<?php

  require('../model/informationCoachModel.php');

  //on teste si la connexion est valide
  if ( empty($_COOKIE['identifiantCookie']) ) {
    //on redirige vers le controller qui fera le traitement
    header('Location: ../index.php');
    exit();
  }

  else {

    if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['phone']) ) {
      $updateInformation = updateCoach( $_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['phone'], $_COOKIE['identifiantCookie']);
    }

    $coach = getCoach($_COOKIE['identifiantCookie']);

    while($data = $coach->fetch()) {
      $name = $data['nomEntraineur'];
      $firstname = $data['prenomEntraineur'];
      $email = $data['emailEntraineur'];
      $phone = $data['telephoneEntraineur'];
      $password = $data['password'];
    }
    $coach->closeCursor();




    require('../view/informationCoachView.php');

  }
