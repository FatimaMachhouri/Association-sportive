<?php include("../connexionDB.php"); ?>

<?php


  function getAllPlayers() {
    $db = dbConnexion();
    $players = $db->query(' SELECT * FROM "AssociationSportive"."Joueur" ORDER BY "nomJoueur" ');
    return $players;
  }//getAllPlayers


  function insertPlayer($nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone) {
    $db = dbConnexion();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "rueJoueur", "codePostalJoueur", "villeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?,?,?,?) ');
    $player->execute(array($nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone));
    return $player;
  }//insertPlayer


  function deletePlayer($idPlayer) {
    $db = dbConnexion();
    $player = $db->prepare ( ' DELETE FROM "AssociationSportive"."Joueur" WHERE "identifiantJoueur" = ? ');
    $player->execute(array($idPlayer));
    return $player;
  }//deletePlayer




  function deletePlayerInd($idPlayer) {
    $db = dbConnexion();
    $player = $db->prepare ( ' DELETE FROM "AssociationSportive"."Joueur" WHERE "identifiantJoueur" = ? ');
    $player->execute(array($idPlayer));
    return $player;
  }//deletePlayer
