<?php
require '../koneksi.php';
$passwordBaru = md5($_POST['password-baru']);
mysqli_query($conn, "UPDATE admin SET password = '$passwordBaru'");
header('Location:ganti-password.php?pesan=berhasil');
