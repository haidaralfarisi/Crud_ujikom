<?php
include "koneksi.php";
$kd_nilai = $_GET['kd_nilai'];
$sql = "DELETE From nilai where kd_nilai='$kd_nilai'";
$result = mysqli_query($connection, $sql);
if ($result) {
    header('location:nilai_view.php');
} else {
    echo "Gagal terhapus";
}
