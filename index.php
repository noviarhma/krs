<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])){
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php;</script>";
  header('refresh:1;url=login.php');
  exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Studentsite</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script src="https://use.fontawesome.com/e52a559693.js"></script>
</head>
<body>
  <!-- NAV TOP START -->
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#3b89c9">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand"style="background-color:#3b89c9; color:#000000;" href="#">JEWEPE UNIVERISTY</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right" >
                  <li><a href="index.php" style="margin-right:20px; color:#000000;">Home</a></li>
                  <li><a href="index.php?halaman=krs" style="margin-right:20px; color:#000000;">KRS</a></li>
                  <li><a href="index.php?halaman=logout" style="margin-left:20px; color:#000000;">Logout<i class="fas fa-sign-out-alt" style="margin-left:5px;"></i></a></li>
              </ul>
          </div>
      </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <!-- NAV SIDE START -->
    <nav class="navbar-default navbar-side" role="navigation" style="background-color:#202020; position:fixed; margin-top:50px;">
      <div class="sidebar-collapse" >
        <ul class="nav" id="main-menu">
          <li>
            <a href="index.php"><i class="fas fa-user-graduate fa-2x"></i>HOME</a>
            <a href="index.php?halaman=krs"><i class="fas fa-book fa-2x"></i>KRS</a>
            <a href="index.php?halaman=ubahpw"><i class="fas fa-key fa-2x"></i>GANTI PASSWORD</a>
            <a href="index.php?halaman=logout"><i class="fas fa-sign-out-alt fa-2x"></i>LOG OUT</a>
          </li>	
        </ul>
      </div>
    </nav>  
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
      <?php 
      if (isset($_GET['halaman'])) 
      {
        if ($_GET['halaman']=="krs")
        {
            include 'krs.php';
        }
        elseif ($_GET['halaman']=="ubahpw") 
        {
            include 'ubahpw.php';
        }
        elseif ($_GET['halaman']=="logout") 
        {
            include 'logout.php';
        }
      }
      else
      {
      include 'profil.php';
      }
      ?>
      </div>
    </div>
  </div>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
