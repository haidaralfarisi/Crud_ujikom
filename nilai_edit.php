<?php
include "koneksi.php";
$kd_nilai = $_GET['kd_nilai'];
$sql = "Select * From nilai where kd_nilai='$kd_nilai'";
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
 include "menu.php";
 include "koneksi.php"
?>
    <div class="container">
        <h2>Edit Nilai</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Nilai</label>
                <input type="text" class="form-control" 
                name="kd_nilai" 
                value='<?php echo $row['kd_nilai']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <select class="form-select" name="nis" placeholder="Masukkan">
                    <?php
                    $sql = "select * from siswa";
                    $result = mysqli_query($connection, $sql);

                    while ($baris = mysqli_fetch_array($result)) {
                        echo "<option value='" . $baris['nis'] . "'>" . $baris['nama_siswa'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Matpel</label>
                <select class="form-select" name="kd_matpel" placeholder="Masukkan Kompetensi">
                    <?php
                    $sql = "select * from matpel";
                    $result = mysqli_query($connection, $sql);

                    while ($baris = mysqli_fetch_array($result)) {
                        echo "<option value='" . $baris['kd_matpel'] . "'>" . $baris['nama_matpel'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai P</label>
                <input type="text" class="form-control" 
                name="nilai_p" 
                value='<?php echo $row['nilai_p']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai K</label>
                <input type="text" class="form-control" 
                name="nilai_k" 
                value='<?php echo $row['nilai_k']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" class="form-control" 
                name="semester" 
                value='<?php echo $row['semester']; ?>' placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tapel</label>
                <input type="text" class="form-control" 
                name="tapel" 
                value='<?php echo $row['tapel']; ?>' placeholder="Masukkan">
            </div>

            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $kd_nilai = $_POST['kd_nilai'];
        $nis = $_POST['nis'];
        $kd_matpel = $_POST['kd_matpel'];
        $nilai_p = $_POST['nilai_p'];
        $nilai_k = $_POST['nilai_k'];
        $semester = $_POST['semester'];
        $tapel = $_POST['tapel'];
        $sql = "UPDATE nilai SET nis='$nis' ,kd_matpel='$kd_matpel' ,nilai_p='$nilai_p',nilai_k='$nilai_k',semester='$semester',tapel='$tapel'WHERE kd_nilai='$kd_nilai'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:nilai_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>