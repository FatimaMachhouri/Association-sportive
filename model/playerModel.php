<?php include("../connexionDB.php"); ?>


<?php


  function getPlayer($idPlayer) {
    $db = dbConnexion();
    $player = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Joueur"."identifiantJoueur" = ? ');
    $player->execute(array($idPlayer));
    return $player;
  }//getJoueur


  function getLicencesPlayer($idPlayer) {
    $db = dbConnexion();
    $player = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Joueur", "AssociationSportive"."Licence", "AssociationSportive"."Equipe", "AssociationSportive"."Saison", "AssociationSportive"."Categorie" WHERE "AssociationSportive"."Joueur"."identifiantJoueur" = "AssociationSportive"."Licence"."identifiantJoueur" AND "AssociationSportive"."Licence"."identifiantEquipe" = "AssociationSportive"."Equipe"."identifiantEquipe" AND "AssociationSportive"."Licence"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Joueur"."identifiantJoueur" = ? ORDER BY "dateDebutSaison" DESC ');
    $player->execute(array($idPlayer));
    return $player;
  }//getLicencesJoueur


  function updatePlayer($idPlayer, $nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone) {
    $db = dbConnexion();
    $player = $db->prepare ( ' UPDATE "AssociationSportive"."Joueur" SET "nomJoueur" = ?, "prenomJoueur" = ?, "dateNaissanceJoueur" = ?, "sexeJoueur" = ?, "rueJoueur" = ?, "codePostalJoueur" = ?, "villeJoueur" = ?, "emailJoueur" = ?, "telephoneJoueur" = ? WHERE "identifiantJoueur" = ? ');
    $player->execute(array($nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone, $idPlayer));
    return $player;
  }//updatePlayer


  function addLicence($idPlayer, $idSeason, $idTeam) {
    $db = dbConnexion();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Licence" ("identifiantJoueur", "identifiantSaison", "identifiantEquipe") VALUES (?,?,?) ');
    $player->execute(array($idPlayer, $idSeason, $idTeam));
    return $player;
  }

  function getSeasons() {
    $db = dbConnexion();
    $seasons = $db->query(' SELECT * FROM "AssociationSportive"."Saison" ORDER BY "dateDebutSaison" DESC');
    return $seasons;
  }//function getSeasons

  function getTeams() {
      $db = dbConnexion();
      $teams = $db->query(' SELECT * FROM "AssociationSportive"."Equipe" ORDER BY "nomEquipe" ');
      return $teams;
  }//function getTeams
