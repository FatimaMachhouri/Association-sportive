
<?php

  require('../model/informationCoachModel.php');

  //on teste si la connexion est valide
  if ( empty($_COOKIE['identifiantCookie']) ) {
    //on redirige vers le controller qui fera le traitement
    header('Location: ../index.php');
    exit();
  }

  else {

    if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) ) {
      $updateInformation = updateCoach( $_COOKIE['identifiantCookie'], $_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['phone'], hash('sha512', $_POST['password']) );
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
