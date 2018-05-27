
<?php

  require('../model/playersModel.php');

    $currentSeason = getCurrentSeason();
    $licencesSeason = getLicencesCurrentSeason();

  require('../view/playersView.php');
