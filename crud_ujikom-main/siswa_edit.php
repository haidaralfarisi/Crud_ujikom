<?php
include "koneksi.php";
$nis = $_GET['nis'];
$sql = "Select * From siswa where nis='$nis'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
<?php
 include "menu.php"
?>
    <div class="container">
        <h2>Edit Matpel</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" 
                name="nis" 
                value='<?php echo $row['nis']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" 
                name="nama_siswa" 
                value='<?php echo $row['nama_siswa']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" 
                name="tempat_lahir" 
                value='<?php echo $row['tempat_lahir']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" 
                name="tgl_lahir" 
                value='<?php echo $row['tgl_lahir']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" 
                name="alamat" 
                value='<?php echo $row['alamat']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" 
                name="no_telepon" 
                value='<?php echo $row['no_telepon']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Kompetensi</label>
                <select class="form-select" name="kd_kompetensi">
                <?php
                    $sql = "SELECT * FROM kompetensi";
                    $result = mysqli_query($connection, $sql);

                    while($baris = mysqli_fetch_array($result)){
                        echo "<option value='".$baris['kd_kompetensi']."'>".$baris['nama_kompetensi']."</option>";
                    }
                ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nama_siswa = $_POST['nama_siswa'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $kd_kompetensi = $_POST['kd_kompetensi'];
        $sql = "UPDATE siswa SET nama_siswa='$nama_siswa',tempat_lahir='$tempat_lahir' ,tgl_lahir='$tgl_lahir',alamat='$alamat',no_telepon='$no_telepon',kd_kompetensi='$kd_kompetensi'WHERE nis='$nis'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:siswa_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>