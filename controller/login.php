
<?php

  require('../model/loginModel.php');


    if ( isset($_POST['loginEmail']) && isset($_POST['loginPassword']) ) {
      require('../view/categoriesView.php');
    }
    else {
      require('../view/loginView.php');
    }
