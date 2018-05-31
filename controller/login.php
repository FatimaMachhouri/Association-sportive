
<?php

  require('../model/loginModel.php');



    if ( isset($_POST['loginEmail']) && isset($_POST['loginPassword']) ) {

      $a = $_POST['loginEmail'];
      $b= $_POST['loginPassword'];

      $pswd = testLogin($_POST['loginEmail']);
      if ($pswd == $_POST['loginPassword']) {
        require('../view/categoriesView.php');
      }
      else {
        require('../view/loginView.php');
      }
    }
    else {
      require('../view/loginView.php');
    }
