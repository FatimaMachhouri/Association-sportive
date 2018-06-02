<?php include("dbConnection.php"); ?>

<?php

  function inscription($name, $firstname, $email, $phone, $password) {
    $db = dbConnection();
    $coach = $db->prepare ( ' INSERT INTO "AssociationSportive"."Entraineur" ("nomEntraineur", "prenomEntraineur", "emailEntraineur", "telephoneEntraineur", "password") VALUES(?,?,?,?,?)');
    $coach->execute(array($name, $firstname, $email, $phone, $password));
    return $coach;
  }//insertCoach permet de s'inscrire lorsqu'on est sur la page de connexion


  function password($email) {
    $db = dbConnection();
    $coach = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Entraineur" WHERE "emailEntraineur" = ? ');
    $coach->execute(array($email));
    return $coach;
  }//password recupère le mot de passe (crypté) correspondant à l'email passé en paramètre
