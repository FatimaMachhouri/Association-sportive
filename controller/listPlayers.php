
<?php

  require('../model/listPlayersModel.php');

    $currentSeason = getCurrentSeason();

    if (isset($_GET['idPlayerDeleteInd'])) {
        $deletePlayer = deletePlayerInd( $_GET['idPlayerDeleteInd'] );
    }

    if (isset($_GET['idPlayerDelete']) && ($_GET['idPlayerDelete']) > 0) {
      $playerDelete = deletePlayer($_GET['idPlayerDelete']);
    }


    if ( isset($_POST['firstnamePlayer']) && isset($_POST['namePlayer']) && isset($_POST['birthday']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['codePostal']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['phoneNumber']) )
    {
      $addPlayer = insertPlayer( $_POST['firstnamePlayer'], $_POST['namePlayer'], $_POST['birthday'], $_POST['gender'], $_POST['address'], $_POST['codePostal'], $_POST['city'], $_POST['email'], $_POST['phoneNumber'] );
    }

    $listPlayers = getAllPlayers();



  require('../view/listPlayersView.php');
