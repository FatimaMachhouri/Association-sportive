<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Entraineurs</title>

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
    <div id="right-panel" class="right-panel">

      <?php include("../componentsPage/header.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Entraineurs du club</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

          <!-- Form add coach -->
          <?php if( strcmp($_COOKIE['roleCookie'], 'administrateur')==0 ) { ?>

            <p>
              <input type="button" class="btn btn-outline-primary" value="Ajouter un entraineur" onclick="javascript:visibilite('formAddCoach'); return false;" />
            </p>

            <div class="col-lg-6">
              <div id="formAddCoach" class="card" style="display: none;">

                <div class="card-header">
                  <strong>Ajouter un entraineur</strong>
                </div>

                <div class="card-body card-block">
                  <form action = "../controller/coaches.php" method="post" class="form-horizontal">

                    <div class="row form-group">
                      <div class="col-12 col-md-9"><input type="text" name="nameCoach" placeholder="Nom" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                      <div class="col-12 col-md-9"><input type="text" name="firstnameCoach" nameCoach placeholder="Prénom" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                      <div class="col-12 col-md-9"><input type="email" name="emailCoach" placeholder="Adresse mail" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                      <div class="col-12 col-md-9"><input type="number" name="phoneNumberCoach" placeholder="Numéro de téléphone" class="form-control"></div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm"> Ajouter </button>

                  </form>
                </div>

              </div>
            </div>
          <?php } ?>
            <!-- Form add coach -->


          <br clear=left>



          <!-- affichier les entraineurs de la saison actuelle avec toutes ses informations -->
          <?php
            while ($data = $coachesSeason->fetch())
            {
          ?>

              <div class="col-sm-6 col-lg-3">
                <div class="card-body pb-0">
                  <div class="boxCoach">
                    <div class="boxCoachInside">
                      <img src="../pictures/playerIcon.png" alt = "Icône coach">
                    </div>
                    <div>
                      <strong> <?php echo htmlspecialchars($data['prenomEntraineur']); ?>
                      <?php echo htmlspecialchars($data['nomEntraineur']); ?> </strong>
                      <div> <?php echo htmlspecialchars($data['emailEntraineur']); ?> </div>
                      <div> <?php echo htmlspecialchars($data['telephoneEntraineur']); ?> </div>

              
                      <button>
                        <a id="linkPlayer" href="coaches.php?idCoachUpdate=<?php echo htmlspecialchars($data['identifiantEntraineur']) ; ?>">
                          Administrateur
                        </a>
                      </button>

                      <?php if( strcmp($_COOKIE['roleCookie'], 'administrateur')==0 ) { ?>
                        <a id="trashIconCoach" href="coaches.php?idCoach=<?php echo htmlspecialchars($data['identifiantEntraineur']); ?>"><img src="../pictures/trashIcon.png" alt="Icône corbeille"/></a>


                      <?php } ?>


                    </div>
                </div>
              </div>
            </div>
          <?php
            }
            $coachesSeason->closeCursor();
          ?>

        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

</body>
</html>
