<?php

//Connexion à la base de données pgSQL sur Heroku
function dbConnexion() {
  try
  {
    //$db = new PDO('pgsql:host=ec2-79-125-117-53.eu-west-1.compute.amazonaws.com;dbname=dambs0svsuad70;', 'crpebwcmpuoamo', '103c03bc05034cf25326ff0b9fbf5fb01834de6605e190d507ce9193aadae49f');
    $db = new PDO('pgsql:host=localhost;dbname=BDDAssociationSportive;', 'postgres', 'amalikmchri2010');

  }
  catch(Exception $e)
  {
    die('Error : '.$e->getMessage());
  }
  return $db;
}//dbConnexion
