<?php
include_once 'psl-config.php';   // As functions.php is not included
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'cmpe195';
$dbname = 'Cudos';
//$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
