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
                        <h1>Entraineurs de la saison</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

          <!-- Form add coach -->
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
                    <div class="col-12 col-md-9"><input type="text" name="firstNameCoach" placeholder="Nom" class="form-control"></div>
                  </div>

                  <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" name="nameCoach" placeholder="Prénom" class="form-control"></div>
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
          <!-- Form add coach -->


          <br clear=left>


          <?php
            while ($data = $coachesSeason->fetch())
            {
          ?>

              <div class="col-sm-6 col-lg-3">
                <div class="card-body pb-0">
                  <div class="boxPlayer">
                    <div class="boxPlayerInside">
                      <img src="../pictures/playerIcon.png" alt = "Icône coach">
                    </div>
                    <div>
                      <strong> <?php echo htmlspecialchars($data['nomEntraineur']); ?>
                      <?php echo htmlspecialchars($data['prenomEntraineur']); ?> </strong>
                      <div> <?php echo htmlspecialchars($data['emailEntraineur']); ?> </div>
                      <div> <?php echo htmlspecialchars($data['telephoneEntraineur']); ?> </div>
                      <div id="trashIcon"> <a href="coaches.php?idCoach=<?php echo htmlspecialchars($data['identifiantEntraineur']); ?>"><img src="../pictures/trashIcon.png" alt="Icône corbeille"/></a> </div>

                      <form action = "coaches.php?idCoachUpdate=<?php echo htmlspecialchars($data['identifiantEntraineur']); ?>" method="post">
                        <div class="col-12 col-md-9"><input type="text" name="firstnameCoachUp" <?php echo 'value="'. $data['nomEntraineur'] .'"'; ?> placeholder="Nom" class="form-control"> </div>
                        <div class="col-12 col-md-9"><input type="text" name="nameCoachUp" <?php echo 'value="'. $data['prenomEntraineur'] .'"'; ?> placeholder="Prénom" class="form-control"> </div>
                        <div class="col-12 col-md-9"><input type="email" name="emailCoachUp" <?php echo 'value="'. $data['emailEntraineur'] .'"'; ?> placeholder="email" class="form-control"> </div>
                        <div class="col-12 col-md-9"><input type="number" name="telCoachUp" <?php echo 'value="'. $data['telephoneEntraineur'] .'"'; ?> placeholder="Téléphone" class="form-control"> </div>
                        <button type="submit"> Modifier </button>
                      </form>


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
