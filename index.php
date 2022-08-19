<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
  session_start();
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Login</title>
    <script type="text/javascript">
      function submitform(){
        document.getElementById("form").submit();
      }
    </script>
  </head>
  <body class="bg-info">
    <div class="container position-absolute top-50 start-50 translate-middle bg-white" style="padding:40px; width:800px">
      <div class="mx-auto text-muted text-center" style="width:250px">
          <h1>Login<h1>
      </div>
      <form class="login" method="post">
      <input class="form-control form-control-lg" type="text" name="username" placeholder="Username"><br>
      <input class="form-control form-control-lg" type="password" name="password" placeholder="Password"><br>
      <div class="d-grid">
      <button class="btn btn-primary btn-lg" type="submit" name="login" >Login</button>
      </div>
      <br>
      </form>
      <div class="text-center">
        Username : admin | Password : admin
      </div>

    <?php
    //check if login form are clicked
      if(isset($_POST['login'])){
        //check is there hhas an empty form
        if($_POST['username']=="" || $_POST['password']==""){
          echo "<div class='alert alert-secondary'>";
          echo "Username dan password tidak boleh kosong";
          echo "</div>";
        } else{
          //validating account data
          $username = $_POST['username'];
          $password = $_POST['password'];
          $qry = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' AND password = md5('$password')");
          $check = mysqli_num_rows($qry);
          //redirect if inputted valid data
          if($check){
            $_SESSION['userweb'] = $username;
            echo "<form method='POST' id='form' action='read.php'>";
            echo "<input type='text' name='uname' value='$username' hidden>";
            echo "<script type=\"text/javascript\">submitform()</script>";
            echo "</form>";
            exit;
          }else {
            echo "<div class='alert alert-secondary'>";
            echo "Invalid Credentials";
            echo "</div>";
          }
        }
      }
    ?>
    </div>
  </body>
</html>
