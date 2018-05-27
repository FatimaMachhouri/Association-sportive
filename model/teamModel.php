<?php include("../connexionDB.php"); ?>


<?php

  function getCurrentSeason() {
    $db = dbConnexion();
    $season = $db->query(' SELECT "dateDebutSaison", "dateFinSaison" FROM "AssociationSportive"."Saison" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ');
    return $season;
  }//getSaisonActuelle


  function getTeam($idTeam) {
    $db = dbConnexion();
    $team = $db->prepare(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie", "AssociationSportive"."Saison" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "identifiantEquipe" = ? ');
    $team->execute(array($idTeam));
    return $team;
  }//function getTeam


  function getLicencesTeam($idTeam) {
    $db = dbConnexion();
    $licences = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Licence", "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "identifiantEquipe" = ? ORDER BY "nomJoueur" ');
    $licences->execute(array($idTeam));
    return $licences;
  }//getLicences
