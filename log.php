<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>CRUD-Prototype</title>
  </head>
  <body>
    <div class="jumbotron text-center" style="padding:20px">
      <p class="lead"><h4>Transaction Log</h4></p>
    </div>
    <div class="container-fluid">
      <a href="read.php" class="btn btn-dark">Go Back</a>
    <table style="display:flex; justify-content: center"><tr><td>
    <table class="table" >
    <thead>
      <tr>
        <h4 class="text-center">Buy Log</h4>
        <br>
      </tr>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Item Name</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
        <?php
          include 'connection.php';
          $sql = "SELECT NamaBarang, Jumlah FROM beli, barang WHERE barang.IDBarang LIKE beli.IDBarang";
          $result = $connect->query($sql);
          $counter = 0;
          if($result->num_rows>0){
           while ($row = $result->fetch_assoc()){
             $counter++;
             echo "<tr>" .
                  "<th scope='row'> $counter </th>" .
                  "<td> {$row['NamaBarang']} </td>" .
                  "<td> {$row['Jumlah']} </td>";
           }
          }
          mysqli_close($connect);
          ?>
    </tbody>
  </table>
</td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td><td>
  <table class="table">
  <thead>
    <tr>
      <h4 class="text-center">Sell Log</h4>
      <br>
    </tr>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Item Name</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
      <?php
        include 'connection.php';
        $sql = "SELECT NamaBarang, Jumlah FROM jual, barang WHERE barang.IDBarang LIKE jual.IDBarang";
        $result = $connect->query($sql);
        $counter = 0;
        if($result->num_rows>0){
         while ($row = $result->fetch_assoc()){
           $counter++;
           echo "<tr>" .
                "<th scope='row'> $counter </th>" .
                "<td> {$row['NamaBarang']} </td>" .
                "<td> {$row['Jumlah']} </td>";
         }
        }
        mysqli_close($connect);
        ?>
  </tbody>
</tr>
</td>
</table>
</table>
</div>
  </body>
</html>
