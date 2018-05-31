<!DOCTYPE html>

<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page de connexion</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../template/assets/css/normalize.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../template/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../template/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../template/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">

    <?php echo $a ?>
    <?php echo $b ?>
    
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="../pictures/logoLogin.png" alt="logo ballon vert">
                    </a>
                </div>
                <div class="login-form">

                    <form action = "../controller/login.php" method="post">
                        <div class="form-group">
                            <label>Adresse mail</label>
                            <input name="loginEmail" type="email" class="form-control" placeholder="Adresse mail">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input name="loginPassword" type="password" class="form-control" placeholder="Mot de passe">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Se connecter</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</body>
</html>
