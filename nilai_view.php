<?php
include 'koneksi.php';
// mengaktifkan session
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Menampilkan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
<?php
 include "menu.php"
?>
    <h2>DATA Nilai</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Nilai</th>
                <th scope="col">NIS</th>
                <th scope="col">Kode Matpel</th>
                <th scope="col">Nilai P</th>
                <th scope="col">Nilai K</th>
                <th scope="col">Semester</th>
                <th scope="col">Tapel</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $sql = "Select * From nilai";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
            <td>$row[kd_nilai]</td>
            <td>$row[nis]</td>
            <td>$row[kd_matpel]</td>
            <td>$row[nilai_p]</td>
            <td>$row[nilai_k]</td>
            <td>$row[semester]</td>
            <td>$row[tapel]</td>
            <td><a href='nilai_edit.php?kd_nilai=$row[kd_nilai]'>EDIT</a> | <a 
            href='nilai_delete.php?kd_nilai=$row[kd_nilai]'>DELETE</a></td>
            </tr>";
            }
            ?>

        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="nilai_add.php" role="button">Tambah Data</a>
    </div>
</body>

</html>