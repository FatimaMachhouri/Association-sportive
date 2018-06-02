<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">

    <title>Équipes par categorie</title>

    <!-- fonction javascript permettant d'afficher et de faire disparaitre un élément -->
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

  <div id="right-panel" class="right-panel right-panel-categorie">

    <?php include("../componentsPage/header.php"); ?>

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Équipes par catégorie</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="content mt-3">

      <!-- On affiche les équipes par catégorie -->
      <?php $teamsTmp = $teams->fetchAll();
        while ($datasCategories = $categories->fetch())
        {
      ?>
          <div class="col-sm-6 col-lg-3">
            <div id="boxCategory" class="card text-white bg-flat-color-2">
              <div class="card-body pb-0">
                <h2> <?php echo htmlspecialchars($datasCategories['libelleCategorie']); ?> </h2>
                <h6> Age minimum : <?php echo htmlspecialchars($datasCategories['ageMinCategorie']); ?> </h6>
                <h6> Age maximum : <?php echo htmlspecialchars($datasCategories['ageMaxCategorie']); ?> </h6>
                </br>

                <ul>
                  <?php foreach($teamsTmp as $datasTeams) {
                    $idCategorieCategorie = htmlspecialchars($datasCategories['identifiantCategorie']);
                    $idCategorieEquipe = htmlspecialchars($datasTeams['identifiantCategorie']); ?>
                    <?php
                      if ($idCategorieCategorie == $idCategorieEquipe) {
                    ?>
                        <li>
                          <a href="team.php?idTeam=<?php echo htmlspecialchars($datasTeams['identifiantEquipe']) ; ?>"> <?php echo htmlspecialchars($datasTeams['nomEquipe']); ?> </a>
                        </li>
                    <?php
                      }
                    }
                    ?>
                </ul>


                <form action = "categories.php?idCategoryUpdate=<?php echo htmlspecialchars($datasCategories['identifiantCategorie']); ?>" method="post" class="form-horizontal">
                  <div class="form-row">
                    <div class="col"> <input type="text" name="valueName" placeholder="Libellé" class="form-control form-control-sm"> </div>
                    <div class="col"> <button type="submit" class="btn btn-primary btn-sm"> Modifier </button> </div>
                  </div>
                </form>


                <div id="trashIcon"> <a href="categories.php?idCategory=<?php echo htmlspecialchars($datasCategories['identifiantCategorie']); ?>"><img src="../pictures/trashIcon.png" alt="Icône corbeille"/></a> </div>
              </div>
            </div>
          </div>


      <?php
        }
        $categories->closeCursor();
      ?>



      <!-- Formulaire pour ajouter une catégorie avec son nom, age début et age fin -->
        <div class="col-lg-6">
          <div id="formAddCategory" class="card" style="display: none;">
            <div class="card-header">
              <strong>Ajouter une catégorie</strong>
            </div>
            <div class="card-body card-block">
              <form action = "../controller/categories.php" method="post" class="form-horizontal">
                <div class="col-12 col-md-9"><input type="text" name="libCateg" placeholder="Libellé" class="form-control"><span class="help-block">Entrez le libellé de la catégorie</span></div>
                <div class="col-12 col-md-9"><input type="number" name="ageMinCateg" placeholder="Age minimum" class="form-control"><span class="help-block">Age minimum de la catégorie</span></div>
                <div class="col-12 col-md-9"><input type="number" name="ageMaxCateg" placeholder="Age maximum" class="form-control"><span class="help-block">Age maximum de la catégorie</span></div>
                <button type="submit" class="btn btn-primary btn-sm"> Ajouter </button>
              </form>
            </div>
          </div>
        </div>


        <!-- Formulaire pour ajouter une équipe -->

          <div class="col-lg-6">
            <div id="formAddTeam" class="card" style="display: none;">
              <div class="card-header">
                <strong>Ajouter une équipe</strong>
              </div>
              <div class="card-body card-block">
                <form action = "../controller/categories.php" method="post" class="form-horizontal">

                  <div class="col-12 col-md-9"><input type="text" name="nameTeam" placeholder="Nom" class="form-control">
                  <select name="saisonTeamAdd" class="form-control-lg form-control">
                    <option value="0">Selectionner la saison</option>
                    <?php
                      while ($data = $seasonTeamInsert->fetch())
                      {
                    ?>
                        <option <?php echo 'value="'. $data['identifiantSaison'] .'"'; ?> > <?= htmlspecialchars($data['dateDebutSaison']) . "/" . htmlspecialchars($data['dateFinSaison']) ?> </option>
                    <?php
                      }
                      $seasonTeamInsert->closeCursor();
                    ?>
                  </select>


                  <select name="categoryTeamAdd" class="form-control-lg form-control">
                    <option value="0">Selectionner la catégorie</option>
                    <?php
                      while ($data = $categoryTeamInsert->fetch())
                      {
                    ?>
                        <option <?php echo 'value="'. $data['identifiantCategorie'] .'"'; ?> > <?= htmlspecialchars($data['libelleCategorie']) ?> </option>
                    <?php
                      }
                      $categoryTeamInsert->closeCursor();
                    ?>
                  </select>


                  <select name="coachTeamAdd" class="form-control-lg form-control">
                    <option value="0">Selectionner l'entraineur</option>
                    <?php
                      while ($data = $coachTeamInsert->fetch())
                      {
                    ?>
                        <option <?php echo 'value="'. $data['identifiantEntraineur'] .'"'; ?> > <?= htmlspecialchars($data['nomEntraineur']) . " " . htmlspecialchars($data['prenomEntraineur']) ?> </option>
                    <?php
                      }
                      $coachTeamInsert->closeCursor();
                    ?>
                  </select>

                  <button type="submit" class="btn btn-primary btn-sm"> Créer l'équipe </button>
                </form>
              </div>
            </div>
          </div>



          <br clear = left>
          <button type="button" class="btn btn-success" onclick="javascript:visibilite('formAddCategory'); return false;">Ajouter une catégorie</button>
          <button type="button" class="btn btn-success" onclick="javascript:visibilite('formAddTeam'); return false;">Ajouter une équipe</button>
          <br> <br> <br>





    </div> <!-- .content -->
  </div><!-- /#right-panel -->
    <!-- Right Panel -->


</body>
</html>
