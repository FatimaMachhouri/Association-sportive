<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">

    <title>Équipes par categorie</title>
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
                  <div class="col-12 col-md-9"><input type="text" name="valueName" placeholder="Libellé" class="form-control"> </div>
                  <button type="submit"> Modifier </button>
                </form>


                <div id="trashIcon"> <a href="categories.php?idCategory=<?php echo htmlspecialchars($datasCategories['identifiantCategorie']); ?>"><img src="../pictures/trashIcon.png" alt="Icône corbeille"/></a> </div>
              </div>
            </div>
          </div>


      <?php
        }
        $categories->closeCursor();
      ?>


      <p>
        <input id="button1" type="button" value="+" onclick="javascript:visibilite('formAddCategory'); return false;" />
      </p>
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

    </div> <!-- .content -->
  </div><!-- /#right-panel -->
    <!-- Right Panel -->


</body>
</html>
