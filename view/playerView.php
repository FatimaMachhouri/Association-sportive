<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Joueur</title>
    <script type="text/javascript">
      function visibilite(id) {
        var targetElement;
        targetElement = document.getElementById(id) ;
        if (targetElement.style.display == "") {
          targetElement.style.display = "none" ;
          }
          else {
          targetElement.style.display = "" ;
          }    
      }   
    </script>
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
        <div id="buttonPlayer">
          <button type="button" class="btn btn-danger"> <a href="listPlayers.php?idPlayerDeleteInd=<?php echo htmlspecialchars($dataPlayer['identifiantJoueur']); ?>"> Supprimer le joueur </a> </button>
        </div>
        <div id="playerInformation">
          <p> Nom : <strong> <?php echo htmlspecialchars($dataPlayer['nomJoueur']); ?> </strong> </p>
          <p> Prénom : <strong> <?php echo htmlspecialchars($dataPlayer['prenomJoueur']); ?> </strong> </p>
          <p> Date de naissance : <strong> <?php echo htmlspecialchars($dataPlayer['dateNaissanceJoueur']); ?> </strong> </p>
          <p> Adresse : <strong> <?php echo htmlspecialchars($dataPlayer['rueJoueur'] . " " . $dataPlayer['codePostalJoueur'] . " " . $dataPlayer['villeJoueur']); ?> </strong> </p>
          <p> @mail : <strong> <?php echo htmlspecialchars($dataPlayer['emailJoueur']); ?> </strong> </p>
          <p> Téléphone : <strong> <?php echo htmlspecialchars($dataPlayer['telephoneJoueur']); ?> </strong> </p>
        </div>

        <br clear=left>

        <?php $identPlayer ?>



        <p>
          <input type="button" class="btn btn-info" value="Modifier les informations" onclick="javascript:visibilite('formUpPlayer'); return false;" />
        </p>

        <!-- Formulaire de modification des données du joueur -->
        <form id="formUpPlayer" class = "form-group" action = "player.php?idPlayer=<?php echo htmlspecialchars($dataPlayer['identifiantJoueur']); ?>" method="post" style="display: none;">
          <div class="form-row">
            <div class="col"><input type="text" name="firstnamePlayerUp" <?php echo 'value="'. $dataPlayer['nomJoueur'] .'"'; ?> placeholder="Nom" class="form-control"> </div>
            <div class="col"><input type="text" name="namePlayerUp" <?php echo 'value="'. $dataPlayer['prenomJoueur'] .'"'; ?> placeholder="Prénom" class="form-control"> </div>
          </div>
          <br>
          <div class="form-group"><input type="date" name="birthdayPlayerUp" <?php echo 'value="'. $dataPlayer['dateNaissanceJoueur'] .'"'; ?> placeholder="Date naissance AAAA-MM-JJ" class="form-control"> </div>
          <div class="form-group"><input type="text" name="genderPlayerUp" <?php echo 'value="'. $dataPlayer['sexeJoueur'] .'"'; ?> placeholder="Sexe" class="form-control"> </div>

          <div class="form-row">
            <div class="col"><input type="text" name="addressPlayerUp" <?php echo 'value="'. $dataPlayer['rueJoueur'] .'"'; ?> placeholder="Rue" class="form-control"> </div>
            <div class="col"><input type="number" name="codePostalJoueurUp" <?php echo 'value="'. $dataPlayer['codePostalJoueur'] .'"'; ?> placeholder="Code postal" class="form-control"> </div>
            <div class="col"><input type="text" name="cityPlayerUp" <?php echo 'value="'. $dataPlayer['villeJoueur'] .'"'; ?> placeholder="Ville" class="form-control"> </div>
          </div>

          <br>
          <div class="form-row">
            <div class="col"><input type="email" name="emailPlayerUp" <?php echo 'value="'. $dataPlayer['emailJoueur'] .'"'; ?> placeholder="email" class="form-control"> </div>
            <div class="col"><input type="number" name="numberPlayerUp" <?php echo 'value="'. $dataPlayer['telephoneJoueur'] .'"'; ?> placeholder="Téléphone" class="form-control"> </div>
          </div>
          <?php $identPlayer = $dataPlayer['identifiantJoueur']; ?>
          <br>
          <button id="buttonUpPlayer" type="submit" class="btn btn-primary"> Modifier </button>
        </form>


      <?php
        }
        $player->closeCursor();
      ?>



      <br clear = left>
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


      <br clear = left>
      <button type="button" class="btn btn-success" onclick="javascript:visibilite('formAddLicence'); return false;">Ajouter une licence</button>


      <div class="col-lg-6">
        <div id="formAddLicence" class="card" style="display: none;">
          <div class="card-header">
            <strong>Licencier le joueur</strong>
          </div>
          <div class="card-body card-block">
            <form action = "../controller/player.php?idPlayer=<?php echo $identPlayer; ?>" method="post" class="form-horizontal">

              <select name="seasonPlayerAdd" class="form-control-lg form-control">
                <option value="0">Selectionner la saison</option>
                <?php
                  while ($data = $seasonLicence->fetch())
                  {
                ?>
                    <option <?php echo 'value="'. $data['identifiantSaison'] .'"'; ?> > <?= htmlspecialchars($data['dateDebutSaison']) . "/" . htmlspecialchars($data['dateFinSaison']) ?> </option>
                <?php
                  }
                  $seasonLicence->closeCursor();
                ?>
              </select>

              <select name="teamPlayerAdd" class="form-control-lg form-control">
                <option value="0">Selectionner l'équipe</option>
                <?php
                  while ($data = $teamLicence->fetch())
                  {
                ?>
                    <option <?php echo 'value="'. $data['identifiantEquipe'] .'"'; ?> > <?= htmlspecialchars($data['nomEquipe']) ?> </option>
                <?php
                  }
                  $teamLicence->closeCursor();
                ?>
              </select>

              <button type="submit" class="btn btn-primary btn-sm"> Licencier </button>
            </form>
          </div>
        </div>
      </div>



    </div> <!-- .content -->

  </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
