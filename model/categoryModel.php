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


  function insertCategorie($libCateg, $ageMinCateg, $ageMaxCateg) {
    $db = dbConnexion();
    $categorie = $db->prepare ( ' INSERT INTO "AssociationSportive"."Categorie" ("libelleCategorie", "ageMinCategorie", "ageMaxCategorie") VALUES(?,?,?)');
    $categorie->execute(array($libCateg, $ageMinCateg, $ageMaxCateg));
    return $categorie;
  }//insertCategorie


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
