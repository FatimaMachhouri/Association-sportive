
<?php

  require('../model/loginModel.php');


    if ( isset($_POST['loginEmail']) && isset($_POST['loginPassword']) ) {
      require('../view/loginView.php');
    }

    else {
      require('../index.php');
    }
