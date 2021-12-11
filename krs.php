<!DOCTYPE html>
<html lang="en">
<?php
include 'koneksi.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- content -->
    <div class="container" style="width:100%">
    <h2>Pengisian KRS</h2>
    <form method="post" style="width:80%">
        <div class="form-group">
        <label for="matkul">Matakuliah</label>
        <select class="form-control" name="matkul">
            <?php
            $no=1; 
            $ambil_data = $koneksi->query("SELECT * From matkul");
            while ($data= $ambil_data->fetch_assoc()) {
            ?>
            <option value="<?php echo $data['kode_matkul']; ?>"><?php echo $data['nama_matkul']; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="form-group form-check">
        </div>
        <button type="submit" name="input" class="btn btn-primary">Submit</button>
    </form>
    <?php
        if (isset($_POST['input']))
        {
            $npm= $_SESSION["user"];
            $matkul = $_POST['matkul'];
            //Query Insert tabel admin
            $koneksi->query("INSERT INTO ambil_matkul (id_krs,npm,kode_matkul) 
            values('','$npm','$matkul')");
            //Setelah melakukan query insert, redirect ke halaman admin.php
            //header("location:index.php");
        } 
    ?>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nama Mata Kuliah</th>
            <th>Jumlah SKS</th>
            
        </tr>
        </thead>
        <tbody>
        <?php
            $npm= $_SESSION["user"];
            $no=1; 
            $ambil = $koneksi->query("SELECT * From matkul inner join ambil_matkul 
            on matkul.kode_matkul=ambil_matkul.kode_matkul where npm='$npm'");
            while ($data= $ambil->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $data['nama_matkul']; ?></td>
            <td><?php echo $data['sks']; ?></td>
        </tr>
        <?php $no++; } ?>
        </tbody>
    </table>
    </div>

</body>
</html>