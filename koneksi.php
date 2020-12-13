<?php
// koneksi ke database
// urutan parameter(nama host, username,pw, nama db)
$conn = mysqli_connect("localhost", "root", "", "anandazulvansyahputra");
if (mysqli_connect_errno()) {
    // jika koneksi gagal, maka tampilkan pesan error
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
