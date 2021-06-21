<?php

  include 'function.php';

  session_start();

  // if(isset($_GET['halaman'])) $halaman = $_GET['halaman'];
  //   else $halaman = "index";

  if(isset($_SESSION['username'])){
    header('Location:halaman_utama.php?halaman=home');
  }
  
?>

<!DOCTYPE html>
<html>
<head>
 <title>LOGIN</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <br><br>

 <?php
 if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
   echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>

 <div class="panel_login">
  <p class="tulisan_atas">Silahkan Masuk</p>

  <form action="cek_login.php" method="post">
   <label>Username</label>
   <input type="text" name="username" class="form_login" placeholder="Username" required="required">

   <label>Password</label>
   <input type="password" name="password" class="form_login" placeholder="Password" required="required">

   <input type="submit" class="tombol_login" value="LOGIN">

   <br/>
   <br/>
   
  </form>
  
 </div>


</body>
</html>