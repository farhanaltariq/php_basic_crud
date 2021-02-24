<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <form action="#" method="post">
      <div class="form-group">
        <label >Item Name</label>
        <input name="NamaBarang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Buy Price</label>
        <input name="HargaBeli" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Sell Price</label>
        <input name="HargaJual" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label>Stock</label>
        <input name="Stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <br>
      <button name="submit" type="submit" class="btn btn-primary">Add Item</button>
    </form>
    </div>
  </body>
</html>
<?php
  include_once 'connection.php';
  if (isset($_POST['submit'])) {
    $NamaBarang = $_POST['NamaBarang'];
    $HargaBeli = $_POST['HargaBeli'];
    $HargaJual = $_POST['HargaJual'];
    $Stok = $_POST['Stok'];

    $query = "INSERT INTO barang (NamaBarang, HargaBeli, HargaJual, stok) VALUES ".
             "('$NamaBarang', '$HargaBeli', '$HargaJual', '$Stok')";
    $sql = mysqli_query($connect, $query);
    if ($sql) {
      header("location:read.php");
    } else {
      echo $query;
      echo "Gagal menambahkan data";
    }
  } else {

  }
?>
