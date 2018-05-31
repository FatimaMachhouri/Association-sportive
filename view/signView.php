<!DOCTYPE html>

<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <title>Authentification</title>

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>



<body class="bg-dark">

  <div class="login-content">
    <div class="login-logo">
      <img class="align-content" src="../pictures/logoLogin.png" alt="Logo ballon vert">
    </div>
    <div class="card-header">
      <h1>Se connecter</h1>
    </div>
    <div class="login-form">
      <form action = "../controller/sign.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label>Adresse mail</label>
          <input type="email" name="emailConnexion" placeholder="Adresse mail" class="form-control">
        </div>
        <div class="form-group">
          <label>Mot de passe</label>
          <input type="password" name="passwordConnexion" placeholder="Mot de passe" class="form-control">
        </div>

        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Se connecter</button>

        <div class="register-link m-t-15 text-center">
          <p>Pas encore de compte ?</p>
        </div>

        <div class="register-link m-t-15 text-center">
          <input id="button1" type="button" value="Incrivez-vous" onclick="javascript:visibilite('signUp'); return false;" />
        </div>

      </form>
    </div>
  </div>



  <div class="login-content">
    <div id="signUp" style="display: none;">
      <div class="login-content">
        <div class="card-header">
          <h1>S'inscrire</h1>
        </div>
        <div class="login-form">
          <form action = "../controller/sign.php" method="post" class="form-horizontal">
            <div class="form-group">
              <label>Nom</label>
              <input type="text" name="firstNameCoachInscri" placeholder="Nom" class="form-control">
            </div>
            <div class="form-group">
              <label>Prénom</label>
              <input type="text" name="nameCoachInscr" placeholder="Prénom" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="emailCoachInscr" placeholder="Adresse mail" class="form-control">
            </div>
            <div class="form-group">
              <label>Numéro de téléphone</label>
              <input type="number" name="phoneNumberCoachInscr" placeholder="Numéro de téléphone" class="form-control">
            </div>
            <div class="form-group">
              <label>Mot de passe</label>
              <input type="password" name="passwordInscr" placeholder="Mot de passe" class="form-control">
            </div>


            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">S'inscrire</button>

          </form>
        </div>
      </div>
    </div>
  </div>



</body>
</html>