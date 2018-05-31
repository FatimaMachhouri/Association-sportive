
<?php

  require('model/signModel.php');

    $currentSeason = getCurrentSeason();

    $i = 0; //permet de ne pas afficher 2 fois la vue

    if ( isset($_POST['firstNameCoachInscri']) && isset($_POST['nameCoachInscr']) && isset($_POST['emailCoachInscr']) && isset($_POST['phoneNumberCoachInscr']) && isset($_POST['passwordInscr']) ) {
      $addCoach = inscription( $_POST['firstNameCoachInscri'], $_POST['nameCoachInscr'], $_POST['emailCoachInscr'], $_POST['phoneNumberCoachInscr'], hash('sha512', $_POST['passwordInscr']) );
    }


    if ( isset($_POST['emailConnexion']) && isset($_POST['passwordConnexion']) ) {
      $pswd = testPassword($_POST['emailConnexion']);
      $pswd2 = $_POST['passwordConnexion'];


      while ($data = $pswd->fetch())
      {
        if ( strcmp( $data['password'], hash('sha512', $pswd2) ) == 0 && $i !=1)  {

          setcookie('identifiantCookie', $data['identifiantEntraineur'], time() + 60, null, null, false, true);
          setcookie('nomCookie', $data['nomEntraineur'], time() + 60, null, null, false, true);
          setcookie('prenomCookie', $data['prenomEntraineur'], time() + 60, null, null, false, true);

          require('view/testView.php');
          $i = 1;
        }

      }

    }

    if ($i !=1 ) {
      require('view/signView.php');
    }
