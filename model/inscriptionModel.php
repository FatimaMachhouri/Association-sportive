<?php include("../connexionDB.php"); ?>

<?php


  function inscription($firstname, $name, $email, $telephone, $password) {
    $db = dbConnexion();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur", "password") VALUES(?,?,?,?,?)');
    $coach->execute(array($firstname, $name, $email, $telephone, $password));
    return $coach;
  }//insertCoach
