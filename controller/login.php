
<?php

  require('../model/loginModel.php');


    require('../view/loginView.php');

    while ( !(isset($_POST['loginEmail'])) && !(isset($_POST['loginPassword'])) ) {
      require('../view/loginView.php');
    }


    require('../index.php')
