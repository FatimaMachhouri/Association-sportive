<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Joueurs de la saison</title>

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
                echo "<h1 id=\"titreVueJoueurs\">";
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


        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
