
<?php

  require('../model/playersModel.php');

    $currentSeason = getCurrentSeason();
    $licencesSeason = getLicencesCurrentSeason();

    if ( isset($_POST['firstnamePlayer']) && isset($_POST['namePlayer']) && isset($_POST['birthday']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phoneNumber']) ) {

      if ( isset($_POST['address']) && isset($_POST['codePostal']) && isset($_POST['city']) ) {
        $addPlayer = insertPlayer( $_POST['firstnamePlayer'], $_POST['namePlayer'], $_POST['birthday'], $_POST['gender'], $_POST['address'], $_POST['codePostal'], $_POST['city'], $_POST['email'], $_POST['phoneNumber'] );
      }
      else {
        $addPlayer = insertPlayerWithoutAddr( $_POST['firstnamePlayer'], $_POST['namePlayer'], $_POST['birthday'], $_POST['gender'], $_POST['email'], $_POST['phoneNumber'] );
      }

    }

  require('../view/playersView.php');
