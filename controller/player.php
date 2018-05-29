
<?php

  require('../model/playerModel.php');

  $currentSeason = getCurrentSeason();

  if (isset($_GET['idPlayer']) && ($_GET['idPlayer']) > 0) {

    if ( isset($_POST['firstnamePlayerUp']) && isset($_POST['namePlayerUp']) && isset($_POST['birthdayPlayerUp']) && isset($_POST['genderPlayerUp']) && isset($_POST['addressPlayerUp']) && isset($_POST['codePostalJoueurUp']) && isset($_POST['cityPlayerUp']) && isset($_POST['emailPlayerUp']) && isset($_POST['numberPlayerUp']) )
    {
      $updatePlayer = updatePlayer($_GET['idPlayer'], $_POST['firstnamePlayerUp'], $_POST['namePlayerUp'], $_POST['birthdayPlayerUp'], $_POST['genderPlayerUp'], $_POST['addressPlayerUp'], $_POST['codePostalJoueurUp'], $_POST['cityPlayerUp'], $_POST['emailPlayerUp'], $_POST['numberPlayerUp']);
    }

    $player = getPlayer($_GET['idPlayer']);

    $playerLicences = getLicencesPlayer($_GET['idPlayer']);

    require('../view/playerView.php');
  }
