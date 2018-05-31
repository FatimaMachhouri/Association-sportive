<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Test</title>

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

    <link rel="stylesheet" href="template/assets/css/normalize.css">
    <link rel="stylesheet" href="template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/assets/css/themify-icons.css">
    <link rel="stylesheet" href="template/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="template/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="template/assets/scss/style.css">
    <link href="template/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <aside id="left-panel" class="left-panel">

      <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
          <a class="navbar-brand"><img src="pictures/logo.png" alt="Logo ballon vert"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">s
              <a href=""> <i class="menu-icon fa fa-dashboard"></i> Deconnexion </a>
            </li>
            <h3 class="menu-title"> Saison actuelle </h3>
            <li>
              <a href="index.php"> <i class="menu-icon fa fa-align-right"></i> Informations </a>
            </li>
            <li>
              <a href="controller/categories.php"> <i class="menu-icon fa fa-dribbble"></i> Equipes </a>
            </li>
            <li>
              <a href="controller/players.php"> <i class="menu-icon fa fa-file-text"></i> Licenciés </a>
            </li>
            <li>
              <a href="controller/coaches.php"> <i class="menu-icon fa fa-user"></i> Entraineurs </a>
            </li>

            <h3 class="menu-title"> Saisons antérieures </h3>
            <li>
              <a href=""> <i class="menu-icon fa fa-th"></i> Saisons </a>
            </li>
            <li>
              <a href="controller/listPlayers.php"> <i class="menu-icon fa fa-users"></i> Joueurs </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->


      </nav>

    </aside><!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

      <header id="header" class="header">

        <div class="header-menu">
          <div class="col-sm-7">

            <div class="header-left">

              <div class="header-left">
                <h4> Utilisateur </h4>
              </div>

              <?php
              while ($datesSeason = $currentSeason->fetch())
              {
              ?>
                <strong> Saison : <?php echo htmlspecialchars($datesSeason['dateDebutSaison']); ?>
                / <?php echo htmlspecialchars($datesSeason['dateFinSaison']); ?> </strong>
              <?php
              }
              $currentSeason->closeCursor();
              ?>
            </div>

          </div>
        </div>

      </header>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Test</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">


        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->



        <script src="../template/assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="../template/assets/js/plugins.js"></script>
        <script src="../template/assets/js/main.js"></script>


</body>
</html>
