<?php
require '../koneksi.php';
if (isset($_POST['ubahHarga'])) {
    $harga = $_POST['harga'];
    $updateHarga = mysqli_query($conn, "UPDATE harga SET harga_per_kilo = '$harga'");
    if ($updateHarga) {
        header('Location:harga.php?ubah-harga=berhasil');
    } else {
        echo mysqli_debug($conn);
        echo mysqli_error($conn);
    }
}
