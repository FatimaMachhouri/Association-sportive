<?php include("../dbConnection.php"); ?>

<?php

  function getLicencesCurrentSeason() {
    $db = dbConnection();
    $licencesSeason = $db->query(' SELECT * FROM "AssociationSportive"."Saison", "AssociationSportive"."Licence", "AssociationSportive"."Joueur", "AssociationSportive"."Equipe", "AssociationSportive"."Categorie" WHERE now() >= "dateDebutSaison" AND now() <= "dateFinSaison" AND "AssociationSportive"."Licence"."identifiantJoueur" = "AssociationSportive"."Joueur"."identifiantJoueur" AND "AssociationSportive"."Saison"."identifiantSaison" = "AssociationSportive"."Licence"."identifiantSaison" AND "AssociationSportive"."Equipe"."identifiantCategorie" = "AssociationSportive"."Categorie"."identifiantCategorie" AND "AssociationSportive"."Licence"."identifiantEquipe" = "AssociationSportive"."Equipe"."identifiantEquipe" ORDER BY "ageMinCategorie", "nomJoueur" ');
    return $licencesSeason;
  }//getLicencesCurrentSeason permet de récuperer les licences de la saion en cours


  function insertPlayer($name, $firstname, $birthday, $gender, $address, $codePostal, $city, $email, $phone) {
    $db = dbConnection();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "rueJoueur", "codePostalJoueur", "villeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?,?,?,?) ');
    $player->execute(array($name, $firstname, $birthday, $gender, $address, $codePostal, $city, $email, $phone));
    return $player;
  }//insertPlayer permet d'ajouter un joueur en remplissant le champ adresse


  function insertPlayerWithoutAddr($name, $firstname, $birthday, $gender, $email, $phone) {
    $db = dbConnection();
    $player = $db->prepare ( ' INSERT INTO "AssociationSportive"."Joueur" ("nomJoueur", "prenomJoueur", "dateNaissanceJoueur", "sexeJoueur", "emailJoueur", "telephoneJoueur") VALUES(?,?,?,?,?,?) ');
    $player->execute(array($name, $firstname, $birthday, $gender, $email, $phone));
    return $player;
  }//insertPlayerWithoutAddr permet d'ajouter un joueur en laissant le champ adresse vide car il peut être nul
