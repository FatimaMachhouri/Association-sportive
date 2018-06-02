<?php include("../dbConnection.php"); ?>


<?php
  function updateCoach($idCoach, $name, $firstName, $email, $phone, $password) {
    $db = dbConnection();
    $coach = $db->prepare ( ' UPDATE "AssociationSportive"."Entraineur" SET "nomEntraineur" = ?, "prenomEntraineur" = ?, "emailEntraineur" = ?, "telephoneEntraineur" = ?, "password" = ? WHERE "identifiantEntraineur" = ? ');
    $coach->execute(array($name, $firstName, $email, $phone, $password, $idCoach));
    return $coach;
  }//updatePlayer permet de mettre à jour les informations d'un coach


  function getCoach($idCoach) {
    $db = dbConnection();
    $player = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Entraineur" WHERE "identifiantEntraineur" = ? ');
    $player->execute(array($idCoach));
    return $player;
  }//permet de récupérer les informations d'un entraineur avec son identifiant
