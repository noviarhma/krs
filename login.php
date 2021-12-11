<!DOCTYPE html>
<?php
session_start();
include 'koneksi.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <title>Login Mahasiswa</title>
</head>
<body>
<!-- form login-->
<div class="container">

    <div class="row text-center ">
        <div class="col-md-12">
            <b> <h1 style="color:black;">Login</b></h1>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> Login Mahasiswa </strong>  
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                    <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                            <input type="text" class="form-control" name="npm"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <button class="btn btn-primary " name="login">Login </button> 
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">Informasi</div>
        <div class="panel-body">Mahasiswa baru silahkan login menggunakan NPM dan Password 
            yang telah diberikan. Setelah login silahkan ganti password pada menu yang telah
            disediakan.
        </div>
</div>
    </div>
</div>



    <?php
    if (isset($_POST['login']))
    {
        $ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE npm='$_POST[npm]' 
        AND passwordmhs = '$_POST[password]'");
        //hitung akun terambil
        $match = $ambil->num_rows;
        //jika 1 akun cocok akan login
        if ($match== 1) 
        {
            //dapat akun dlm bentuk array
            $row_akun = $ambil->fetch_assoc();
            //simpan di session user
            $_SESSION["user"]=$row_akun["npm"];
            echo"<div class='alert alert-info'>Login Success</div>";
            echo"<meta http-equiv='refresh' content='1;url=index.php'>";
        } else{
            //gagal login
            echo"<div class='alert alert-danger'>Login Failed</div>";
            echo"<meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }
    ?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>