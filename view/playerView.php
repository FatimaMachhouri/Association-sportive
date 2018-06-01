<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Joueur</title>

    <link rel="stylesheet" href="../template/assets/css/normalize.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../template/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../template/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../template/assets/scss/style.css">
    <link href="../template/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../style.css">

</head>
<body>


  <?php include("../componentsPage/leftPanel.html"); ?>


  <!-- Right Panel -->

  <div id="right-panel" class="right-panel right-panel-joueur">

    <?php include("../componentsPage/header.php"); ?>


    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Joueur</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- On affiche les informations d'un joueur -->
    <div class="content mt-3">
      <?php
        while ($dataPlayer = $player->fetch())
        {
      ?>
        <div id="playerInformation">
          <p> Nom : <strong> <?php echo htmlspecialchars($dataPlayer['nomJoueur']); ?> </strong> </p>
          <p> Prénom : <strong> <?php echo htmlspecialchars($dataPlayer['prenomJoueur']); ?> </strong> </p>
          <p> Date de naissance : <strong> <?php echo htmlspecialchars($dataPlayer['dateNaissanceJoueur']); ?> </strong> </p>
          <p> Adresse : <strong> <?php echo htmlspecialchars($dataPlayer['rueJoueur'] . " " . $dataPlayer['codePostalJoueur'] . " " . $dataPlayer['villeJoueur']); ?> </strong> </p>
          <p> @mail : <strong> <?php echo htmlspecialchars($dataPlayer['emailJoueur']); ?> </strong> </p>
          <p> Téléphone : <strong> <?php echo htmlspecialchars($dataPlayer['telephoneJoueur']); ?> </strong> </p>
        </div>

        <br clear=left>

        <!-- Formulaire de modification des données du joueur -->
        <form class = "form-group" action = "player.php?idPlayer=<?php echo htmlspecialchars($dataPlayer['identifiantJoueur']); ?>" method="post">
          <div class="col-12 col-md-9"><input type="text" name="firstnamePlayerUp" <?php echo 'value="'. $dataPlayer['nomJoueur'] .'"'; ?> placeholder="Nom" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="text" name="namePlayerUp" <?php echo 'value="'. $dataPlayer['prenomJoueur'] .'"'; ?> placeholder="Prénom" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="date" name="birthdayPlayerUp" <?php echo 'value="'. $dataPlayer['dateNaissanceJoueur'] .'"'; ?> placeholder="Date naissance" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="text" name="genderPlayerUp" <?php echo 'value="'. $dataPlayer['sexeJoueur'] .'"'; ?> placeholder="Sexe" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="text" name="addressPlayerUp" <?php echo 'value="'. $dataPlayer['rueJoueur'] .'"'; ?> placeholder="Rue" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="number" name="codePostalJoueurUp" <?php echo 'value="'. $dataPlayer['codePostalJoueur'] .'"'; ?> placeholder="Code postal" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="text" name="cityPlayerUp" <?php echo 'value="'. $dataPlayer['villeJoueur'] .'"'; ?> placeholder="Ville" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="email" name="emailPlayerUp" <?php echo 'value="'. $dataPlayer['emailJoueur'] .'"'; ?> placeholder="email" class="form-control"> </div>
          <div class="col-12 col-md-9"><input type="number" name="numberPlayerUp" <?php echo 'value="'. $dataPlayer['telephoneJoueur'] .'"'; ?> placeholder="Téléphone" class="form-control"> </div>
          <button type="submit"> Modifier </button>
        </form>

        <br clear=left>
        <button> <td><a href="listPlayers.php?idPlayerDeleteInd=<?php echo htmlspecialchars($dataPlayer['identifiantJoueur']); ?>"> Supprimer le joueur </a></td> </button>


      <?php
        }
        $player->closeCursor();
      ?>




      <!-- Liste de toutes les licences du joueur -->
      </br>
      <h2> Licences du joueur </h2>
      </br>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"> Début saison </th>
            <th scope="col"> Fin saison </th>
            <th scope="col"> Equipe </th>
            <th scope="col"> Catégorie </th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($dataLicences = $playerLicences->fetch())
              {
            ?>
                <tr>
                  <td><?php echo htmlspecialchars($dataLicences['dateDebutSaison']); ?></td>
                  <td><?php echo htmlspecialchars($dataLicences['dateFinSaison']); ?></td>
                  <td><a href="team.php?idTeam=<?php echo htmlspecialchars($dataLicences['identifiantEquipe']); ?>"> <?php echo htmlspecialchars($dataLicences['nomEquipe']);?></a></td>
                  <td><?php echo htmlspecialchars($dataLicences['libelleCategorie']); ?></td>
                </tr>
          </tbody>
          <?php
            }
            $playerLicences->closeCursor();
          ?>
      </table>


    </div> <!-- .content -->

  </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
