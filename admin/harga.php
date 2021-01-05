<?php
require 'header.php';
require 'functions.php';

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5">
            <?php
            if (isset($_GET['ubah-harga'])) {
                if ($_GET['ubah-harga'] == 'berhasil') {
                    echo "<div class='alert alert-success' role='alert'>
                    Harga berhasil diganti !
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                  </div>";
                }
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <h4><i class="fas fa-dollar-sign"></i> Ubah Harga</h4>
                    <?php
                    $harga = mysqli_query($conn, "SELECT harga_per_kilo FROM harga");
                    while ($h = mysqli_fetch_array($harga)) {
                    ?>

                        <form action="harga_update.php" method="post">
                            <div class="form-group">
                                <label for="ChangePrice">Harga Per Kilo</label>
                                <input type="number" class="form-control" id="ChangePrice" name="harga" value="<?= $h['harga_per_kilo']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="ubahHarga">Ubah Harga</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>