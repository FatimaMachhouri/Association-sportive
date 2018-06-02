<?php include("../dbConnection.php"); ?>

<?php

  function getCoaches() {
    $db = dbConnection();
    $coaches = $db->query(' SELECT * FROM "AssociationSportive"."Entraineur" ORDER BY "nomEntraineur" ');
    return $coaches;
  }//getCoaches permet de récupérer tous les entraineurs


  function insertCoach($firstname, $name, $email, $telephone) {
    $db = dbConnection();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur") VALUES(?,?,?,?)');
    $coach->execute(array($firstname, $name, $email, $telephone));
    return $coach;
  }//insertCoach permet d'ajouter un entraineur


  function deleteCoach($idCoach) {
    $db = dbConnection();
    $coach = $db->prepare ( ' DELETE FROM "AssociationSportive"."Entraineur" WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($idCoach));
    return $coach;
  }//deleteCoach permet de supprimer un entraineur


  function updateCoachFirstname($idCoach, $firstname) {
    $db = dbConnection();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "prenomEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($firstname, $idCoach));
    return $coach;
  }//permet de modifier les informations d'un entraineur


  function updateCoachName($idCoach, $name) {
    $db = dbConnection();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "nomEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($name, $idCoach));
    return $coach;
  }//permet de modifier les informations d'un entraineur


  function updateCoachMail($idCoach, $email) {
    $db = dbConnection();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "emailEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($email, $idCoach));
    return $coach;
  }//permet de modifier les informations d'un entraineur


  function updateCoachPhone($idCoach, $phone) {
    $db = dbConnection();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "telephoneEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($phone, $idCoach));
    return $coach;
  }//permet de modifier les informations d'un entraineur
