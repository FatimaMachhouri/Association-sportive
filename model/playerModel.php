<?php include("../dbConnection.php"); ?>

<?php

  function getPlayer($idPlayer) {
    $db = dbConnection();
    $player = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Joueur"."identifiantJoueur" = ? ');
    $player->execute(array($idPlayer));
    return $player;
  }//permet de récupérer les informations d'un joueur avec son identifiant


  function getLicencesPlayer($idPlayer) {
    $db = dbConnection();
    $player = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Joueur", "AssociationSportive"."Licence", "AssociationSportive"."Equipe", "AssociationSportive"."Saison", "AssociationSportive"."Categorie" WHERE "AssociationSportive"."Joueur"."identifiantJoueur" = "AssociationSportive"."Licence"."identifiantJoueur" AND "AssociationSportive"."Licence"."identifiantEquipe" = "AssociationSportive"."Equipe"."identifiantEquipe" AND "AssociationSportive"."Licence"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Joueur"."identifiantJoueur" = ? ORDER BY "dateDebutSaison" DESC ');
    $player->execute(array($idPlayer));
    return $player;
  }//permet de récupérer les licences d'un joueur dont on passe l'identifiant en paramètre


  function updatePlayer($idPlayer, $name, $firstName, $birthday, $gender, $address, $codePostal, $city, $email, $phone) {
    $db = dbConnection();
    $player = $db->prepare ( ' UPDATE "AssociationSportive"."Joueur" SET "nomJoueur" = ?, "prenomJoueur" = ?, "dateNaissanceJoueur" = ?, "sexeJoueur" = ?, "rueJoueur" = ?, "codePostalJoueur" = ?, "villeJoueur" = ?, "emailJoueur" = ?, "telephoneJoueur" = ? WHERE "identifiantJoueur" = ? ');
    $player->execute(array($name, $firstName, $birthday, $gender, $address, $codePostal, $city, $email, $phone, $idPlayer));
    return $player;
  }//updatePlayer permet de mettre à jour les informations d'un joueur


  function addLicence($idPlayer, $idSeason, $idTeam) {
    $db = dbConnection();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Licence" ("identifiantJoueur", "identifiantSaison", "identifiantEquipe") VALUES (?,?,?) ');
    $player->execute(array($idPlayer, $idSeason, $idTeam));
    return $player;
  }//permet d'ajouter une licence au joueur


  function getSeasons() {
    $db = dbConnection();
    $seasons = $db->query(' SELECT * FROM "AssociationSportive"."Saison" ORDER BY "dateDebutSaison" DESC');
    return $seasons;
  }//on récupère les saisons de la base de données avec date début et fin

  function getTeams() {
      $db = dbConnection();
      $teams = $db->query(' SELECT * FROM "AssociationSportive"."Equipe" ORDER BY "nomEquipe" ');
      return $teams;
  }//on récupère les équipes de la base de données
