<?php
include "koneksi.php";
$kd_kompetensi = $_GET['kd_kompetensi'];
$sql = "DELETE From kompetensi where kd_kompetensi='$kd_kompetensi'";
$result = mysqli_query($connection, $sql);
if ($result) {
    header('location:kompetensi_view.php');
} else {
    echo "Gagal terhapus";
}
