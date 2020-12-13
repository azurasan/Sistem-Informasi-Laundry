<?php
// mengaktifkan session
session_start();
// menyisipkan koneksi.php
require('koneksi.php');
// menangkap username dan password yang dikirim oleh user
$username = $_POST['username'];
// enkripsi password yang dikirim oleh user
$password = md5($_POST['password']);
// ambil username & password dari tabel admin
$data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password = '$password'");
// cek apakah data tersebut ada
$cek = mysqli_num_rows($data);
// jika ada, maka akan dibuat session
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // redirect ke admin/index.php
    header('Location: admin/index.php');
} else {
    // redirect ke halaman index.php sambil mengirimkan pesan gagal
    header('Location: index.php?pesan=gagal');
}
