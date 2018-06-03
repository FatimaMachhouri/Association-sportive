<?php

//Connexion à la base de données pgSQL sur Heroku ! On affiche un message en cas d'erreur
function dbConnection() {
  try
  {

    //on récupère les variables d'environnement
    $host = getenv("Host");
    $dbname = getenv("Database");
    $username = getenv("User");
    $password = getenv("Password");

    $db = new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);

  }
  catch(Exception $e)
  {
    die('Error : '.$e->getMessage());
  }
  return $db;
}//dbConnexion
