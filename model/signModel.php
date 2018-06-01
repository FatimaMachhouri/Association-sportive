<?php include("connexionDB.php"); ?>

<?php

  function getCurrentSeason() {
    $db = dbConnexion();
    $season = $db->query(' SELECT "dateDebutSaison", "dateFinSaison" FROM "AssociationSportive"."Saison" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ');
    return $season;
  }//getSaisonActuelle


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
