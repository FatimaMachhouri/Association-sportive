<?php include("../dbConnection.php"); ?>

<?php

  function getCategories() {
    $db = dbConnection();
    $categories = $db->query(' SELECT * FROM "AssociationSportive"."Categorie" ORDER BY "ageMinCategorie" ');
    return $categories;
  }//function getCategories permet de récuperer toutes les catégories


  function getTeams() {
      $db = dbConnection();
      $teams = $db->query(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Saison" WHERE "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ORDER BY "nomEquipe" ');
      return $teams;
  }//function getTeams permet de récupérer uniquement les équipes de la saison actuelle


  function insertCategorie($categ, $ageMin, $ageMax) {
    $db = dbConnection();
    $categorie = $db->prepare ( ' INSERT INTO "AssociationSportive"."Categorie" ("libelleCategorie", "ageMinCategorie", "ageMaxCategorie") VALUES(?,?,?)');
    $categorie->execute(array($categ, $ageMin, $ageMax));
    return $categorie;
  }//insertCategorie permet de créer une catégorie avec son libellé, son age min et son age max


  function deleteCategory($idCateg) {
    $db = dbConnection();
    $category = $db->prepare ( ' DELETE FROM "AssociationSportive"."Categorie" WHERE "identifiantCategorie" = ? ');
    $category->execute(array($idCateg));
    return $category;
  }//deleteCategory permet de supprimer une catégorie


  function updateCategory($idCateg, $valueName) {
    $db = dbConnection();
    $category = $db->prepare (' UPDATE "AssociationSportive"."Categorie" SET "libelleCategorie" = ? WHERE "identifiantCategorie" = ? ');
    $category->execute(array($valueName, $idCateg));
    return $category;
  }//updateCategory permet de changer le nom d'une catégorie


  function insertTeam($name, $season, $category, $coach) {
    $db = dbConnection();
    $team = $db->prepare ( ' INSERT INTO "AssociationSportive"."Equipe" ("nomEquipe", "identifiantSaison", "identifiantCategorie", "identifiantEntraineur") VALUES (?,?,?,?) ');
    $team->execute(array($name, $season, $category, $coach));
    return $team;
  }//permet de créer une équipe avec son nom, sa saion, sa catégorie et son entraineur


  function getSeasons() {
    $db = dbConnection();
    $seasons = $db->query(' SELECT * FROM "AssociationSportive"."Saison" ORDER BY "dateDebutSaison" DESC');
    return $seasons;
  }//function getSeasons permet de récupérer les différentes saisons stockées avec date de début et fin de la saison


  function getCoaches() {
    $db = dbConnection();
    $coaches = $db->query(' SELECT * FROM "AssociationSportive"."Entraineur" ORDER BY "nomEntraineur" ');
    return $coaches;
  }//on récupère les entraineurs de la base de données 
