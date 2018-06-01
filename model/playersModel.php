<?php include("../connexionDB.php"); ?>

<?php


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


  function insertPlayer($nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone) {
    $db = dbConnexion();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "rueJoueur", "codePostalJoueur", "villeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?,?,?,?) ');
    $player->execute(array($nom, $prenom, $dateNaissance, $sexe, $rue, $codePostal, $ville, $email, $telephone));
    return $player;
  }//insertPlayer


  function insertPlayerWithoutAddr($nom, $prenom, $dateNaissance, $sexe, $email, $telephone) {
    $db = dbConnexion();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?) ');
    $player->execute(array($nom, $prenom, $dateNaissance, $sexe, $email, $telephone));
    return $player;
  }//insertPlayerWithoutAddr
