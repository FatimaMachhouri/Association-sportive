<?php include("dbConnection.php"); ?>

<?php

  function password($email) {
    $db = dbConnection();
    $coach = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Entraineur" WHERE "emailEntraineur" = ? ');
    $coach->execute(array($email));
    return $coach;
  }//password recupère le tuple correspondant à l'email passé en paramètre
