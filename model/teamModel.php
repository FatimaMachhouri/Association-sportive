<?php include("../dbConnection.php"); ?>

<?php

  function getTeam($idTeam) {
    $db = dbConnection();
    $team = $db->prepare(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie", "AssociationSportive"."Saison", "AssociationSportive"."Entraineur" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantEntraineur" = "AssociationSportive"."Entraineur"."identifiantEntraineur" AND "identifiantEquipe" = ? ');
    $team->execute(array($idTeam));
    return $team;
  }//getTeam permet de récupérer les informations d'une équipe en passant en paramètre son identifiant


  function getLicencesTeam($idTeam) {
    $db = dbConnection();
    $licences = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Licence", "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "identifiantEquipe" = ? ORDER BY "nomJoueur" ');
    $licences->execute(array($idTeam));
    return $licences;
  }//getLicences permet de récuperer les licences d'une équipe


  function deleteTeam($idTeam) {
    $db = dbConnection();
    $team = $db->prepare ( ' DELETE FROM "AssociationSportive"."Equipe" WHERE "identifiantEquipe"= ? ' );
    $team->execute(array($idTeam));
    return $team;
  } //deleteTeam permet de supprimer une équipe en passant en paramètre son identifiant
