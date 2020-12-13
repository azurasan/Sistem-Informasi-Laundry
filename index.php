<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100 justify-content-center align-items-center flex-column">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger' role='alert'>
        Login Gagal! Username dan password salah !
      </div>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-danger' role='alert'>
        Anda berhasil logout!
      </div>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-danger' role='alert'>
        Anda harus login terlebih dahulu!
      </div>";
                }
            }
            ?>
            <h1 class="my-2 mb-4 text-center">Sistem Informasi Laundry</h1>

            <form class="col-lg-3 bg-success text-light p-4 rounded" action="login.php" method="POST">
                <div class="form-group">
                    <label for="exampleInput">Username</label>
                    <input type="text" class="form-control" id="exampleInput" aria-describedby="emailHelp" name="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-1">Login</button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
</body>

</html>