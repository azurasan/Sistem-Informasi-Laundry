<?php
session_start();
// apakah user sudah login?
if ($_SESSION['status'] != 'login') {
    // jika belum, maka akan redirect ke halaman login
    header('Location:../index.php?pesan=belum_login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laundry</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="shortcut icon" href="../assets\flaticon\washing-machine.png" type="image/x-icon">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <img src="../assets/flaticon/washing-machine.png" alt="washing-machine">
            <a class="navbar-brand ml-1" href="index.php"> Laundry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="pelanggan.php"><i class="fas fa-users"></i> Pelanggan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="transaksi.php"><i class="fas fa-money-check-alt"></i> Transaksi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="laporan.php"><i class="fas fa-file-alt"></i> Laporan</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-cog"></i> Pengaturan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="harga.php"><i class="fas fa-dollar-sign"></i> Pengaturan Harga</a>
                            <a class="dropdown-item" href="ganti-password.php"><i class="fas fa-edit"></i> Ganti Password</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav mx-lg-3">
                    <li class="nav-item text-white">Halo, <?= $_SESSION['username']; ?></li>
                </ul>
                <form class="form-inline">
                    <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </form>
            </div>
        </div>
    </nav>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>