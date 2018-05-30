<?php

  require('../model/loginModel.php');

  $pswd = testLogin($_POST['loginEmail']);
  if ( isset($_POST['loginEmail']) && isset($_POST['loginPassword']) && ($pswd == $_POST['loginPassword']) ) {
    require('index.php');
  }

  else {
    require('login.php');
  }
