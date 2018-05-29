<?php include("../connexionDB.php"); ?>


<?php

  function getCurrentSeason() {
    $db = dbConnexion();
    $season = $db->query(' SELECT "dateDebutSaison", "dateFinSaison" FROM "AssociationSportive"."Saison" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" ');
    return $season;
  }//getSaisonActuelle


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
