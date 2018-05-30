
<?php

  require('loginModel.php');


  if ( isset($_POST['loginEmail']) ) {

    $pswdTest = testLogin($_POST['loginEmail']);

    if ( $pswdTest == $_POST['loginPassword']) ) {
      require('index.php');
    }

  }

  else {
    require('pageLogin.php');
  }
