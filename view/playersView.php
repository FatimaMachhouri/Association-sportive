<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Joueurs de la saison</title>

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

    <?php include("../componentsPage/leftPanel.php"); ?>



    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

      <?php include("../componentsPage/header.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Licenciés de la saison par catégorie</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

          <?php
            $idCategoriePrevious = "";
            $index = 0;

            while ($data = $licencesSeason->fetch())
            {
              if ($index == 0) {
                $idCategoriePrevious = htmlspecialchars($data['identifiantCategorie']);
                echo "<h1 id=\"titlePlayersView\">";
                echo htmlspecialchars($data['libelleCategorie']);
                echo "</h1>";
                echo "<hr/>";
                $index = 1;
              }
              else if ( $idCategoriePrevious != htmlspecialchars($data['identifiantCategorie']) ) {
                echo "<br clear=left>";
                $idCategoriePrevious = htmlspecialchars($data['identifiantCategorie']);
                echo "<h1 id=\"titlePlayersView\">";
                echo htmlspecialchars($data['libelleCategorie']);
                echo "</h1>";
                echo "<hr/>";
              }
          ?>

              <div class="col-sm-6 col-lg-3">
                <div class="card-body pb-0">
                  <div class="boxPlayer">
                    <div class="boxPlayerInside">
                      <img src="../pictures/playerIcon.png" alt = "Icône joueur">
                    </div>
                    <div>
                      <a id="linkPlayer" href="player.php?idPlayer=<?php echo htmlspecialchars($data['identifiantJoueur']) ; ?>">
                        <strong> <?php echo htmlspecialchars($data['nomJoueur']); ?> </strong>
                        <strong> <?php echo htmlspecialchars($data['prenomJoueur']); ?> </strong>
                      </a>
                    </div>
                    <div> Catégorie : <?php echo htmlspecialchars($data['libelleCategorie']); ?> </div>
                    <div> Équipe : <?php echo htmlspecialchars($data['nomEquipe']); ?> </div>
                </div>
              </div>
            </div>
          <?php
            }
            $licencesSeason->closeCursor();
          ?>


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
                <form action = "../controller/players.php" method="post" class="form-horizontal">

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
                          <input type="radio" name="gender" class="form-check-input"> Femme
                        </label>
                        <label class="form-check-label ">
                          <input type="radio" name="gender" class="form-check-input"> Homme
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

                </form>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="fa fa-dot-circle-o"></i> Ajouter
                </button>
              </div>

            </div>
          </div>
          <!-- Form add player -->





        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
