
<?php

  require('../model/loginModel.php');


    if ( isset($_POST['loginEmail']) && isset($_POST['loginPassword']) ) {
      require('categories.php')
    }
    else {
      require('login.php');
    }
