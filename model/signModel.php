<?php include("connexionDB.php"); ?>

<?php


  function inscription($firstname, $name, $email, $telephone, $password) {
    $db = dbConnexion();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur", "password") VALUES(?,?,?,?,?)');
    $coach->execute(array($firstname, $name, $email, $telephone, $password));
    return $coach;
  }//insertCoach


  function testPassword($email) {
    $db = dbConnexion();
    $coach = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Entraineur" WHERE "emailEntraineur" = ? ');
    $coach->execute(array($email));
    return $coach;
  }//testPassword
