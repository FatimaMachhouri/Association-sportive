
<?php

  require('../model/model.php');

    $currentSeason = getCurrentSeason();
    $seasons = getSeasons();
    $teams = getTeams();

  require('../view/seasonView.php');
