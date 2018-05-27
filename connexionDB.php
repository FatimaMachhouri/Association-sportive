<?php

function dbConnexion() {
  try
  {
    $db = new PDO('pgsql:host=localhost;dbname=BDDAssociationSportive;', 'postgres', 'amalikmchri2010');
  }
  catch(Exception $e)
  {
    die('Error : '.$e->getMessage());
  }
  return $db;
}//dbConnexion
