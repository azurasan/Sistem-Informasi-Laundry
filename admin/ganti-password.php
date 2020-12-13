<?php require 'header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == 'berhasil') {
                    echo "<div class='alert alert-success' role='alert'>
                    Password berhasil diganti !
                  </div>";
                }
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <h4><i class="fas fa-edit"></i> Ganti Password</h4>
                    <form action="ganti-password-aksi.php" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control" id="ChangePassword" placeholder="Masukkan Password Baru Anda" name="password-baru">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>