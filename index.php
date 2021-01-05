<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        body {
            background-image: url(assets/img/laundry.jpg);
        }
    </style>
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


            <form class="col-lg-3 bg-light text-dark p-4 rounded border border-dark" action="login.php" method="POST">
                <h3 class="text-center mb-5">Login Page</h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInput" placeholder="Username" name="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-1">Login</button>
            </form>
            <span class="fixed-bottom text-white ml-3">Photo by <a href="https://unsplash.com/@biancajordan?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="blank">Bianca Jordan</a> on <a href="https://unsplash.com/s/photos/laundry?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="blank">Unsplash</a></span>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
</body>

</html>