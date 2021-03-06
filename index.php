<!-- Page de connexion -->

<?php

  require('model/signModel.php');


  //si l'utilisateur a demandé à être deconnecté, on supprime les cookies qui permettaient de maintenir la connexion et on envoie l'utilisateur sur la page de connexion
  if(isset($_GET['deconnexion'])) {
    setcookie("identifiantCookie");
    setcookie("nomCookie");
    setcookie("prenomCookie");
    require('view/signView.php');
  }

  else {

    //test est-ce que l'utilisateur est connecté? Si oui, on lui affiche la première page
    if ( isset($_COOKIE['identifiantCookie']) ) {
      header('Location: controller/categories.php');
    }

    else {

      //s'il tente de se connecter
      if ( isset($_POST['emailConnexion']) && isset($_POST['passwordConnexion']) ) {
        //on récupère dans la base de donnée le mdp correspondant à cet email (s'il existe)
        $password = password($_POST['emailConnexion']);
        $enteredPassword = $_POST['passwordConnexion'];

        while ($data = $password->fetch())
        {

          //s'il son champ role n'est pas vide, on rentre dans le if
          if ( isset($data['role']) ) {

            //on n'oublie pas de crypter le mot de passe entré pour pouvoir le comparer avec celui stocké
            if ( strcmp( $data['password'], hash('sha512', $enteredPassword) ) == 0 )  {
              setcookie('identifiantCookie', $data['identifiantEntraineur'], time() + 2*60*60);
              setcookie('nomCookie', $data['nomEntraineur'], time() + 2*60*60);
              setcookie('prenomCookie', $data['prenomEntraineur'], time() + 2*60*60);
              setcookie('roleCookie', $data['role'], time() + 2*60*60);
              header('Location: controller/categories.php');
            } //if

          }

        } //while
        $password->closeCursor();
      } //elseif

    } //else

    //cas où il n'a pas tapé le bon mot de passe, on le renvoie vers la page de connexion
    require('view/signView.php');

  } //else
