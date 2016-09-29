<?php

  try{
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'cmpe195';
    $db_name = 'Cudos';

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



  }
  catch(PDOException $ex) {
      echo 'ERROR: ' . $ex->getMessage();
  }
?>
