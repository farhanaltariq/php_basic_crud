<?php
session_start();
  include 'connection.php';
  if(!isset($_SESSION['userweb']))
    header("location:index.php");
  if (isset($_POST['sell']) OR isset($_POST['buy'])) {
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    if (isset($_POST['sell']))
      $table = 'jual';
    else
      $table = 'beli';
    $query = "INSERT INTO $table (IDBarang, Jumlah) VALUES ($id, $jumlah)";
    $sql  = mysqli_query($connect, $query);
    if ($sql){
      $table = null;
      header("location:read.php");
    }
    else
      echo "Gagal : " . $query;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>CRUD-Prototype</title>
  </head>
  <body>
    <div class="jumbotron text-center" style="padding:20px">
      <h1 class="display-4">Yanto Material</h1>
      <hr class="my-4">
      <p class="lead">Yanto Material's Goods Management.</p>
    </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Item Name</th>
      <th scope="col">Buy Price</th>
      <th scope="col">Sell Price</th>
      <th scope="col">Stock</th>
      <th colspan="4"></th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "SELECT * FROM barang";
        $result = $connect->query($sql);
        $counter = 0;
        if($result->num_rows>0){
         while ($row = $result->fetch_assoc()){
           $counter++;
           echo "<tr>" .
                "<th scope='row'> $counter </th>" .
                "<td> {$row['NamaBarang']} </td>" .
                "<td> {$row['HargaBeli']} </td>" .
                "<td> {$row['HargaJual']} </td>" .
                "<td> {$row['Stok']} </td>" .

                "<form action='#' method='post'>" .
                "<td><input name='id' value={$row['IDBarang']} hidden>".
                "<input name='jumlah' type='number' min='1' name='jumlah' placeholder='Qty' style='width:80px'>" .
                "<br><button name='buy' type='submit' class='btn btn-sm btn-success' style='margin-left:21px; margin-top:4px'>Buy &#9650;</button></td>" .
                "</form>" .

                "<form action='#' method='post'>" .
                "<input name='id' value={$row['IDBarang']} hidden>".
                "<td><input type='number' min='1' name='jumlah' placeholder='Qty' style='width:80px'>".
                "<br><button name='sell' class='btn btn-sm btn-warning' style='margin-left:21px; margin-top:4px'>Sell &#9660;</button></td>" .
                "</form>" .

                "<form action='update.php' method='post'>" .
                "<input name='id' value={$row['IDBarang']} hidden>".
                "<td><button type='submit' class='btn btn-sm btn-info'>Edit</button></td>" .
                "</form>" .

                "<form action='delete.php' method='post'>" .
                "<input name='id' value={$row['IDBarang']} hidden>".
                "<td><button class='btn btn-sm btn-danger'>Delete</button></td>" .
                "</form></tr>" ;
         }
        }
        mysqli_close($connect);
        ?>
        <td></td>
        <td><a href='create.php' class='btn btn-sm btn-secondary mx-auto'>Add Item</a></td>
        <td><a href='log.php' class='btn btn-sm btn-info mx-auto'>Log</a></td>
        <td><a href='logout.php' class='btn btn-sm btn-danger mx-auto'>Sign Out</a></td>
  </tbody>
</table>
  </body>
</html>
