<?php

$DB_URL = "localhost";
$DB_Username = "root";
$DB_Password = "";
$DB_Name = "YantoMaterial";
$connect = mysqli_connect($DB_URL, $DB_Username, $DB_Password, $DB_Name);
if(!$connect)
  echo "Database Connection Failed";
?>
