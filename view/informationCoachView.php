<!DOCTYPE html>

<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes informations</title>

    <link rel="stylesheet" href="../template/assets/css/normalize.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../template/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../template/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../template/assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>



<body class="bg-dark">

  <?php include("../componentsPage/leftPanel.html"); ?>


  <div id="right-panel" class="right-panel">
    <div class="content mt-3">

      <div class="login-content">
        <div class="card-header">
          <h1> Mes informations </h1>
        <div class="login-form">
          <form action = "informationCoach.php" method="post" class="form-horizontal">
            <div class="form-group">
              <label>Nom</label>
              <input type="text" name="name" class="form-control" <?php echo 'value="'. $name .'"'; ?>>
            </div>
            <div class="form-group">
              <label>Prénom</label>
              <input type="text" name="firstname" class="form-control" <?php echo 'value="'. $firstname .'"'; ?> >
            </div>
            <div class="form-group">
              <label>Adresse mail</label>
              <input type="email" name="email" class="form-control"  <?php echo 'value="'. $email .'"'; ?>>
            </div>
            <div class="form-group">
              <label>Téléphone</label>
              <input type="number" name="phone" class="form-control"  <?php echo 'value="'. $phone .'"'; ?>>
            </div>
            <div class="form-group">
              <label>Mot de passe</label>
              <input type="password" name="password" class="form-control" placeholder="Entrez le mot de passe si vous souhaitez le modifier" <?php 'value="'. $phone .'"'; ?>>
            </div>

            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Enregistrer</button>
          </form>
        </div>
      </div>

      </div>
    </div> <!-- content -->
  </div> <!-- right panel -->

</body>
</html>
