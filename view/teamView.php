<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Équipe</title>

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

  <div id="right-panel" class="right-panel right-panel-equipe">

    <?php include("../componentsPage/header.php"); ?>

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Équipe</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="content mt-3">

      <div id="teamInformation">
        <?php
          while ($data = $team->fetch()) {
        ?>
            <h1> Nom équipe : <?= htmlspecialchars($data['nomEquipe']) ?> </h1>
            <h1> Catégorie : <?= htmlspecialchars($data['libelleCategorie']) ?> </h1>
            <h1> Entraineur : <?= htmlspecialchars($data['nomEntraineur']) . " " . htmlspecialchars($data['prenomEntraineur'])   ?> </h1>

        <?php
          }
          $team->closeCursor();
        ?>
      </div>

      </br>
        <h2 id="titleTeamView2"> Joueurs de l'équipe </h2>
      </br>

      <table class="table table-striped teamTable">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col"> Consulter les informations du joueur </th>
          </tr>
        </thead>
        <tbody>
          <?php
            while ($licencesJoueurs = $licences->fetch()) {
          ?>
              <tr>
                <td> <?= htmlspecialchars($licencesJoueurs['nomJoueur']) ?> </td>
                <td> <?= htmlspecialchars($licencesJoueurs['prenomJoueur']) ?> </td>
                <td> <a href="player.php?idPlayer=<?php echo htmlspecialchars($licencesJoueurs['identifiantJoueur']); ?>">Cliquez ici</a> </td>
          <?php
            }
            $licences->closeCursor();
          ?>
              </tr>
        </tbody>
      </table>


      <br clear=left>
      <br clear=left>

      <div class="col col-md-3"><label for="selectLg" class=" form-control-label"><h3>Ajouter un joueur</h3></label></div>
      <div class="col-12 col-md-9">
        <select class="form-control-lg form-control">
          <option value="0">Selectionner nom du joueur à ajouter à l'équipe</option>
          <?php
            while ($data = $licenceToAdd->fetch())
            {
          ?>
              <option> <?= htmlspecialchars($data['nomJoueur']) . " " . htmlspecialchars($data['prenomJoueur']) ?> </option>
          <?php
            }
            $licenceToAdd->closeCursor();
          ?>
        </select>
      </div>


    </div> <!-- .content -->

  </div><!-- /#right-panel -->
    <!-- Right Panel -->


</body>
</html>
