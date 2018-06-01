<?php include("../connexionDB.php"); ?>


<?php


  function getTeam($idTeam) {
    $db = dbConnexion();
    $team = $db->prepare(' SELECT * FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie", "AssociationSportive"."Saison", "AssociationSportive"."Entraineur" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Equipe"."identifiantSaison" = "AssociationSportive"."Saison"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantEntraineur" = "AssociationSportive"."Entraineur"."identifiantEntraineur" AND "identifiantEquipe" = ? ');
    $team->execute(array($idTeam));
    return $team;
  }//function getTeam


  function getLicencesTeam($idTeam) {
    $db = dbConnexion();
    $licences = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Licence", "AssociationSportive"."Joueur" WHERE "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "identifiantEquipe" = ? ORDER BY "nomJoueur" ');
    $licences->execute(array($idTeam));
    return $licences;
  }//getLicences


  function getLicencesToAdd($idTeam) {
    $db = dbConnexion();
    $licence = $db->prepare ( ' SELECT * FROM "AssociationSportive"."Joueur" WHERE (current_date - "dateNaissanceJoueur")/365 >= ( SELECT "ageMinCategorie" FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "identifiantEquipe" = ? ) AND  (current_date-"dateNaissanceJoueur")/365 <= ( SELECT "ageMaxCategorie" FROM "AssociationSportive"."Equipe", "AssociationSportive"."Categorie" WHERE "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "identifiantEquipe" = ? ) ');
    $licence->execute(array($idTeam, $idTeam));
    return $licence;
  }//getLicencesToAdd
