<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'koneksi.php';
$npm= $_SESSION['user'];
$ambil=$koneksi->query("SELECT * FROM mahasiswa WHERE npm='$npm'");
$column= $ambil->fetch_assoc();
?>
<div class="container" style="width:100%;">
    <h2 style="margin-top:50px;">Biodata</h2>
    <form method="post" enctype="multipart/form-data" style="margin:5px 50px 0px ; width:80%;">
        <div class="form-group">
            <label for="">NPM</label>
            <input type="text" readonly="" class="form-control" name="npm" value="<?php echo $column['npm']; ?>">
        </div>
        <div class="form-group">
            <label for="">Masukkan Password Baru</label>
            <input type="password" class="form-control" name="password" value="<?php echo $column['passwordmhs']; ?>">
        </div>
        <button name="update" type="submit" class="btn btn-primary">Save</button>
    </form>
    <?php
        $npm = $_SESSION['user'];
        if (isset($_POST['update'])) 
        {
            $koneksi->query("UPDATE mahasiswa SET passwordmhs='$_POST[password]' WHERE npm='$npm'");
            echo "<br><div class='alert alert-info'>Password Baru Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=profil'>";
        }
    ?>
</body>
</html>