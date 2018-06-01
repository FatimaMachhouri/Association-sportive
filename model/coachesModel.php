<?php include("../connexionDB.php"); ?>


<?php

  function getCurrentSeason() {
    $db = dbConnexion();
    $season = $db->query(' SELECT "dateDebutSaison", "dateFinSaison" FROM "AssociationSportive"."Saison" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ');
    return $season;
  }//getSaisonActuelle


  function getCoaches() {
    $db = dbConnexion();
    $coaches = $db->query(' SELECT * FROM "AssociationSportive"."Entraineur" ORDER BY "nomEntraineur" ');
    return $coaches;
  }//function getCoaches


  function insertCoach($firstname, $name, $email, $telephone) {
    $db = dbConnexion();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur") VALUES(?,?,?,?)');
    $coach->execute(array($firstname, $name, $email, $telephone));
    return $coach;
  }//insertCoach


  function deleteCoach($idCoach) {
    $db = dbConnexion();
    $coach = $db->prepare ( ' DELETE FROM "AssociationSportive"."Entraineur" WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($idCoach));
    return $coach;
  }//deleteCoach


  function updateCoach($idCoach, $nomCoach, $prenomCoach, $emailCoach, $telephoneCoach) {
    $db = dbConnexion();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "nomEntraineur" = ?, "prenomEntraineur" = ?, "emailEntraineur" = ?, "telephoneEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($nomCoach, $prenomCoach, $emailCoach, $telephoneCoach, $idCoach));
    return $coach;
  }//updateCoach

  function updateCoachFirstname($idCoach, $nomCoach) {
    $db = dbConnexion();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "nomEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($nomCoach, $idCoach));
    return $coach;
  }//updateCoach

  function updateCoachName($idCoach, $prenomCoach) {
    $db = dbConnexion();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "prenomEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($prenomCoach, $idCoach));
    return $coach;
  }//updateCoach

  function updateCoachMail($idCoach, $email) {
    $db = dbConnexion();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "emailEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($email, $idCoach));
    return $coach;
  }//updateCoach

  function updateCoachPhone($idCoach, $tel) {
    $db = dbConnexion();
    $coach = $db->prepare (' UPDATE "AssociationSportive"."Entraineur" SET "telephoneEntraineur" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($tel, $idCoach));
    return $coach;
  }//updateCoach
