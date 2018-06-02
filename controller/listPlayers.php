
<?php

  require('../model/listPlayersModel.php');


    if ( empty($_COOKIE['identifiantCookie']) ) {
      //on teste si le cookie est vide. Si c'est le cas, c'est que le cookie est mort donc l'utilisateur n'est plus connecté, on redirige vers le controller de la page de connexion
      header('Location: ../index.php');
      exit();
    }

    else {
      if (isset($_GET['idPlayerDeleteInd']) && $_GET['idPlayerDeleteInd'] > 0) {

        $deletePlayer = deletePlayer( $_GET['idPlayerDeleteInd'] );
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
    }
