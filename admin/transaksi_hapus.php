<?php
require '../koneksi.php';
if (isset($_POST['delete'])) {
    $id = $_POST['transaksi_id'];
    echo $id;
    $query = "DELETE FROM transaksi WHERE transaksi_id = '$id'";
    $hapusDataTransaksi = mysqli_query($conn, $query) or die(mysqli_error($conn));

    header('Location:transaksi.php?hapus-data=berhasil');
}
