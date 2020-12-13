<?php
// mengaktifkan session
session_start();
// menghapus session
session_destroy();
// redirect ke halaman index.php sambil mengirimkan pesan menggunakan method GET
header('Location:../index.php?pesan=logout');
