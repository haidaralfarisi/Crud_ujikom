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
        <h2>TAMBAH Matpel</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Matpel</label>
                <input type="text" class="form-control" name="kode_matpel" placeholder="Masukkan kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" class="form-control" name="nama_matpel" placeholder="Masukkan Nama matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="text" class="form-control" name="jumlah_jam" placeholder="Masukkan Jumlah jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode kompetensi</label>
                <select class="form-select" name="kd_kompetensi" placeholder="Masukkan Kompetensi">
                    <?php
                    $sql = "select * from kompetensi";
                    $result = mysqli_query($connection, $sql);

                    while ($baris = mysqli_fetch_array($result)) {
                        echo "<option value='" . $baris['kd_kompetensi'] . "'>" . $baris['nama_kompetensi'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <select class="form-select" name="nip" placeholder="Masukkan Kompetensi">
                    <?php
                    $sql = "select * from guru";
                    $result = mysqli_query($connection, $sql);

                    while ($baris = mysqli_fetch_array($result)) {
                        echo "<option value='" . $baris['nip'] . "'>" . $baris['nama_guru'] .  "</option>";
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
        $kode_matpel = $_POST['kode_matpel'];
        $nama_matpel = $_POST['nama_matpel'];
        $jumlah_jam = $_POST['jumlah_jam'];
        $tingkat = $_POST['tingkat'];
        $kd_kompetensi = $_POST['kd_kompetensi'];
        $nip = $_POST['nip'];

        $sql = "INSERT INTO matpel VALUES ('$kode_matpel', '$nama_matpel', '$jumlah_jam', '$tingkat', '$kd_kompetensi', '$nip')";
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