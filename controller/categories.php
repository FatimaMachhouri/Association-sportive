
<?php

  require('../model/categoryModel.php');

    if ( empty($_COOKIE['identifiantCookie']) ) {
      //on redirige vers le controller qui fera le traitement
      header('Location: ../index.php');
      exit();
    }

    else {
      if ( isset($_GET['idCategory']) ) {
        $deleteCategory = deleteCategory($_GET['idCategory']);
      }

      if ( isset($_GET['idCategoryUpdate']) && isset($_POST['valueName']) ) {
        $updateCategory = updateCategory($_GET['idCategoryUpdate'], $_POST['valueName']);
      }

      if (isset($_POST['libCateg']) && isset($_POST['ageMinCateg']) && isset($_POST['ageMaxCateg'])) {
        $addCategorie = insertCategorie($_POST['libCateg'], $_POST['ageMinCateg'], $_POST['ageMaxCateg']);
      }

      $categories = getCategories();
      $teams = getTeams();
      require('../view/categoriesView.php');

    }
