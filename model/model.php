<?php include("../connexionDB.php"); ?>


<?php

  function getCategories() {
    $db = dbConnexion();
    $categories = $db->query(' SELECT * FROM "AssociationSportive"."Categorie" ORDER BY "ageMinCategorie" ');
    return $categories;
  }//function getCategories


  function getTeams() {
      $db = dbConnexion();
      $teams = $db->query(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Saison" WHERE "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ORDER BY "nomEquipe" ');
      return $teams;
  }//function getTeams


  function getTeam($idTeam) {
    $db = dbConnexion();
    $team = $db->prepare(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie", "AssociationSportive"."Saison" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "identifiantEquipe" = ? ');
    $team->execute(array($idTeam));
    return $team;
  }//function getTeam


  function getSeasons() {
      $db = dbConnexion();
      $seasons = $db->query(' SELECT * FROM "AssociationSportive"."Saison" ORDER BY "dateDebutSaison" DESC ');
      return $seasons;
  }//function getTeams


  function getLicencesTeam($idTeam) {
    $db = dbConnexion();
    $licences = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Licence", "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "identifiantEquipe" = ? ORDER BY "nomJoueur" ');
    $licences->execute(array($idTeam));
    return $licences;
  }//getLicences


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


  function insertCategorie($libCateg, $ageMinCateg, $ageMaxCateg) {
    $db = dbConnexion();
    $categorie = $db->prepare ( ' INSERT INTO "AssociationSportive"."Categorie" ("libelleCategorie", "ageMinCategorie", "ageMaxCategorie") VALUES(?,?,?)');
    $categorie->execute(array($libCateg, $ageMinCateg, $ageMaxCateg));
    return $categorie;
  }//insertCategorie


  function getCurrentSeason() {
    $db = dbConnexion();
    $season = $db->query(' SELECT "dateDebutSaison", "dateFinSaison" FROM "AssociationSportive"."Saison" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ');
    return $season;
  }//getSaisonActuelle


  function getLicencesCurrentSeason() {
    $db = dbConnexion();
    $licencesSeason = $db->query(' SELECT * FROM "AssociationSportive"."Saison", "AssociationSportive"."Licence", "AssociationSportive"."Joueur", "AssociationSportive"."Equipe", "AssociationSportive"."Categorie" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" AND "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "AssociationSportive"."Saison"."identifiantSaison" = "AssociationSportive"."Licence"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Licence"."identifiantEquipe" = "AssociationSportive"."Equipe"."identifiantEquipe" ORDER BY "ageMinCategorie", "nomJoueur" ');
    return $licencesSeason;
  }//getLicencesCurrentSeason


  function deleteCategory($idCateg) {
    $db = dbConnexion();
    $category = $db->prepare ( ' DELETE FROM "AssociationSportive"."Categorie" WHERE "identifiantCategorie" = ? ');
    $category->execute(array($idCateg));
    return $category;
  }//deleteCategory


  function updateCategory($idCateg, $valueName) {
    $db = dbConnexion();
    $category = $db->prepare (' UPDATE "AssociationSportive"."Categorie" SET "libelleCategorie" = ? WHERE "identifiantCategorie" = ? ');
    $category->execute(array($valueName, $idCateg));
    return $category;
  }//updateCategory
