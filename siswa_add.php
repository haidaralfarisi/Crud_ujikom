<!DOCTYPE html>
<html>

<head>
    <title>Menambah Data</title>
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
        <h2>TAMBAH Siswa</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukkan">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan">
            </div>
            
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan">
            </div>
            

            <div class="mb-3">
                <label class="form-label">Kode kompetensi</label>
                <select class="form-select" name="kd_kompetensi" placeholder="Masukkan">
                    <?php
                    $sql = "select * from kompetensi";
                    $result = mysqli_query($connection, $sql);

                    while ($baris = mysqli_fetch_array($result)) {
                        echo "<option value='" . $baris['kd_kompetensi'] . "'>" . $baris['nama_kompetensi'] . "</option>";
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
    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nama_siswa = $_POST['nama_siswa'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $kd_kompetensi = $_POST['kd_kompetensi'];

        $sql = "INSERT INTO siswa VALUES ('$nis', '$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_telepon', '$kd_kompetensi')";
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