<!DOCTYPE html>
<html lang="en">
<?php
include 'koneksi.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="adminn/assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Biodata Mahasiswa</title>
</head>
<body>
<!--form data-->
<div class="container" style="width:100%;">
    <h2 style="margin-top:50px;">Biodata</h2>
    <?php
    //ambil session user
    $npm= $_SESSION["user"];
    //tampil data berdasarkan npm
    $ambil=$koneksi->query("SELECT * FROM mahasiswa WHERE npm='$npm'");
    $column= $ambil->fetch_assoc();

    ?>
    <form method="post" enctype="multipart/form-data" style="margin:5px 50px 0px ; width:80%;">
        <div class="form-group text-center">
            <img src="admin/foto/<?php echo $column['foto'] ?>" width="200px;" height="200px;">
        </div>
        <div class="form-group">
            <label>Ganti Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="">NPM</label>
            <input type="text" readonly="" class="form-control" name="npm" value="<?php echo $column['npm']; ?>">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $column['nama_mhs']; ?>">
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jk" class="form-control">
            <option><?php echo $column['gender'];?></option>
                <?php  
                $if = $column['gender'] ;
                if($if == "Laki-Laki"){ ?>
                <option value="Perempuan">Perempuan</option>
                <?php }elseif($if == "Perempuan"){ ?>
                <option value="Laki-Laki">Laki-Laki</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl" value="<?php echo $column['tgl_lahir']; ?>">
        </div>
        <div class="form-group">
            <label for="">No Handphone</label>
            <input type="text" class="form-control" name="nohp" value="<?php echo $column['nohp']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $column['email']; ?>">
        </div>
        <button name="update" type="submit" class="btn btn-primary">Save</button>
    </form>
    <?php 
    $npm = $_SESSION['user'];
    if (isset($_POST['update']))
    {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        if (!empty($lokasi))
        {
            move_uploaded_file($lokasi,"admin/foto/".$nama);

            $koneksi->query("UPDATE mahasiswa SET nama_mhs='$_POST[nama]',gender='$_POST[jk]',
            tgl_lahir='$_POST[tgl]',nohp='$_POST[nohp]',email='$_POST[email]',foto='$nama' 
            WHERE npm=$npm");
        }
        else
        {
            $koneksi->query("UPDATE mahasiswa SET nama_mhs='$_POST[nama]',gender='$_POST[jk]',
            tgl_lahir='$_POST[tgl]',nohp='$_POST[nohp]',email='$_POST[email]' 
            WHERE  npm=$npm");
        }
        echo "<script>alert('Data Anda telah di Update');</script>";
        echo "<script>location='index.php'</script>";
    }
    ?>
</div>
</body>
</html>