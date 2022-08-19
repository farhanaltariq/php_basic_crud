<?php
  session_start();
  include_once 'connection.php';
  $id = $_POST['id'];
  $sql = "SELECT * FROM barang WHERE IDbarang LIKE $id";
  $result = $connect->query($sql);
  if($result->num_rows>0){
   while ($row = $result->fetch_assoc()){
     $nama = $row['NamaBarang'];
     $hb = $row['HargaBeli'];
     $hj = $row['HargaJual'];
     $stok = $row['Stok'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script type="text/javascript">
      function submitform(){
        document.getElementById("form").submit();
      }
      </script>
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <h4 class="text-center">Update Data</h4>
    <form action="#" method="post">
      <input type="text" name="id" value="<?=$id?>" hidden>
      <div class="form-group">
        <br>
        <label >Item Name</label>
        <input type="text" name="NamaBarang" value="<?php echo $nama;?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <br>
        <label >Buy Price</label>
        <input name="HargaBeli" value=<?php echo $hb?> type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <br>
        <label >Sell Price</label>
        <input name="HargaJual" value=<?php echo $hj?> type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <br>
        <label> Stock</label>
        <input name="stok" value=<?php echo $stok;?> type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <br>
      <button name="submit" type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
    </div>
  </body>
</html>

<?php
  if (isset($_POST['submit'])) {
    $NamaBarang = $_POST['NamaBarang'];
    $stok = $_POST['stok'];
    $HargaBeli = $_POST['HargaBeli'];
    $HargaJual = $_POST['HargaJual'];
    $query = "UPDATE barang SET NamaBarang = '$NamaBarang', ".
             "stok='$stok', HargaBeli='$HargaBeli', ".
             "HargaJual='$HargaJual' ".
             "WHERE IDBarang='$id';";
             echo $query;
    $sql = mysqli_query($connect, $query);
    if ($sql){
      $_SESSION['userweb'] = "new";
      echo "<form method='POST' id='form' action='read.php' hidden>";
      echo "<input type='text' name='uname' value='$username' hidden>";
      echo "<script type=\"text/javascript\" hidden>submitform()</script>";
      echo "</form>";
    }else
      echo "Gagal merubah data";
  }
?>
