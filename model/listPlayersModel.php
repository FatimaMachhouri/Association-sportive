<?php include("../dbConnection.php"); ?>

<?php

  function getAllPlayers() {
    $db = dbConnection();
    $players = $db->query(' SELECT * FROM "AssociationSportive"."Joueur" ORDER BY "nomJoueur" ');
    return $players;
  }//getAllPlayers permet de récuperer les informations de tous les joueurs


  function insertPlayer($name, $firstname, $birthday, $gender, $address, $codePostal, $city, $email, $phone) {
    $db = dbConnection();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "rueJoueur", "codePostalJoueur", "villeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?,?,?,?) ');
    $player->execute(array($name, $firstname, $birthday, $gender, $address, $codePostal, $city, $email, $phone));
    return $player;
  }//insertPlayer permet d'ajouter un joueur à la base de données


  function deletePlayer($idPlayer) {
    $db = dbConnection();
    $player = $db->prepare ( ' DELETE FROM "AssociationSportive"."Joueur" WHERE "identifiantJoueur" = ? ');
    $player->execute(array($idPlayer));
    return $player;
  }//pour supprimer un joueur
