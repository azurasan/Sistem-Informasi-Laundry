<?php
require 'functions.php';
session_start();
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan
    if (insertData($_POST) > 0) {
        header('Location:pelanggan.php?status-insert=berhasil');
    } else {
        echo "Data gagal ditambahkan";
    }
}
