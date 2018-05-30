<?php include("../connexionDB.php"); ?>

<?php

  function testLogin($email) {
    $db = dbConnexion();
    $login = $db->prepare ( ' SELECT "password" FROM "AssociationSportive"."Entraineur" WHERE "emailEntraineur" = ? ');
    $login->execute(array($email));
    return $login;
  }//testLogin
