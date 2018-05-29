<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Liste joueurs</title>

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
    <div id="right-panel" class="right-panel right-panel-listPlayers">

      <?php include("../componentsPage/header.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Joueurs du club</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

          <div class="titleListPlayers">
            <h1> Liste joueurs </h1>
          </div>

          </br>


          <!-- Form add player -->
          <br clear=left>
          <br/>

          <p>
            <input type="button" class="btn btn-default btn-lg btn-block" value="Ajouter un joueur" onclick="javascript:visibilite('formAddPlayer'); return false;" />
          </p>

          <div class="col-lg-6">
            <div id="formAddPlayer" class="card" style="display: none;">

              <div class="card-header">
                <strong>Ajouter un joueur</strong>
              </div>

              <div class="card-body card-block">
                <form action = "../controller/listPlayers.php" method="post" class="form-horizontal">

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="firstnamePlayer" placeholder="Nom" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="namePlayer" placeholder="Prénom" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Sexe : </label></div>
                    <div class="col col-md-9">
                      <div class="form-check-inline form-check">
                        <label class="form-check-label ">
                          <input type="radio" name="gender" value="F" class="form-check-input"> Féminin
                        </label>
                        <label class="form-check-label ">
                          <input type="radio" name="gender" value="M" class="form-check-input"> Masculin
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="date" name="birthday" placeholder="Date de naissance" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="address" placeholder="Rue" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="number" name="codePostal" placeholder="Code postal" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="city" placeholder="Ville" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="email" name="email" placeholder="Adresse mail" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="number" name="phoneNumber" placeholder="Numéro de téléphone" class="form-control"></div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-sm"> Ajouter </button>

                </form>
              </div>

            </div>
          </div>
          <!-- Form add player -->

          <br>

          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Consulter</th>
                <th scope="col">Supprimer</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($data = $listPlayers->fetch())
                {
              ?>
              <tr>
                <td><?php echo htmlspecialchars($data['nomJoueur']); ?></td>
                <td><?php echo htmlspecialchars($data['prenomJoueur']); ?></td>
                <td><a href="player.php?idPlayer=<?php echo htmlspecialchars($data['identifiantJoueur']); ?>"> Consulter </a></td>
                <td><a href="listPlayers.php?idPlayerDelete=<?php echo htmlspecialchars($data['identifiantJoueur']); ?>"> Supprimer </a></td>
              </tr>
            </tbody>
            <?php
              }
              $listPlayers->closeCursor();
            ?>
          </table>


        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
