<?php include("../dbConnection.php"); ?>

<?php

  function getCoaches() {
    $db = dbConnection();
    $coaches = $db->query(' SELECT * FROM "AssociationSportive"."Entraineur" WHERE "role" is not null ORDER BY "nomEntraineur" ');
    return $coaches;
  }//getCoaches permet de récupérer tous les entraineurs


  function insertCoach($firstname, $name, $email, $telephone) {
    $db = dbConnection();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur", "password", "role") VALUES(?,?,?,?,?,?)');
    $coach->execute(array($firstname, $name, $email, $telephone, hash('sha512',$email), 'entraineur'));
    return $coach;
  }//insertCoach permet d'ajouter un entraineur


  function deleteCoach($idCoach) {
    $db = dbConnection();
    $coach = $db->prepare ( ' DELETE FROM "AssociationSportive"."Entraineur" WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($idCoach));
    return $coach;
  }//deleteCoach permet de supprimer un entraineur


  function setAdmin($idCoach) {
    $db = dbConnection();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "role" = \'administrateur\' WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($idCoach));
    return $coach;
  }//permet définir un coach en tant que administrateur
