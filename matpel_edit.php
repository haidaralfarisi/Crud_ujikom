<?php
include "koneksi.php";
$kd_matpel = $_GET['kd_matpel'];
$sql = "Select * From matpel where kd_matpel='$kd_matpel'";
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
                <label class="form-label">Kode Matpel</label>
                <input type="text" class="form-control" 
                name="kd_matpel" value='<?php echo
                $row['kd_matpel']; ?>' placeholder="Masukkan kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" class="form-control" 
                name="nama_matpel" value='<?php echo
                $row['nama_matpel']; ?>' placeholder="Masukkan Nama Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="text" class="form-control" 
                name="jumlah_jam" value='<?php echo
                $row['jumlah_jam']; ?>' placeholder="Masukkan Jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" class="form-control" 
                name="tingkat" value='<?php echo
                $row['tingkat']; ?>' placeholder="Masukkan kode">
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
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <select class="form-select" name="nip">
                <?php
                    $sql = "SELECT * FROM guru";
                    $result = mysqli_query($connection, $sql);

                    while($baris = mysqli_fetch_array($result)){
                        echo "<option value='".$baris['nip']."'>".$baris['nama_guru']."</option>";
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
        $kd_matpel = $_POST['kd_matpel'];
        $nama_matpel = $_POST['nama_matpel'];
        $jumlah_jam = $_POST['jumlah_jam'];
        $tingkat = $_POST['tingkat'];
        $kd_kompetensi = $_POST['kd_kompetensi'];
        $nip = $_POST['nip'];
        $sql = "UPDATE matpel SET nama_matpel='$nama_matpel',jumlah_jam='$jumlah_jam' ,tingkat='$tingkat',kd_kompetensi='$kd_kompetensi' ,nip='$nip' WHERE kd_matpel='$kd_matpel'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:matpel_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>