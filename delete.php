<?php

$id = $_POST['id'];
include_once "connection.php";
$sql = mysqli_query($connect, "DELETE FROM barang WHERE IDBarang = '$id';");

if ($sql)
  header("location:read.php");
 else
  echo "Gagal menghapus data";

?>
