<?php
require '../koneksi.php';
require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-3">
            <!-- <a href="transaksi_invoice_cetak.php?id=<?= $id; ?>" class="btn btn-primary float-right mb-3  d-print-none"><i class="fas fa-print"></i> Cetak</a> -->
            <a href="#" class="btn btn-primary float-right mb-3  d-print-none" onclick="window.print()"><i class="fas fa-print"></i> Cetak</a>
            <?php
            $id = $_GET['id'];
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi,pelanggan WHERE transaksi_id = '$id' AND transaksi_pelanggan = pelanggan_id");
            while ($t = mysqli_fetch_array($transaksi)) {
            ?>
                <table class="table">
                    <tr>
                        <th>No.Invoice</th>
                        <td>:</td>
                        <td>INVOICE-<?= $t['transaksi_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Tgl.Laundry</th>
                        <td>:</td>
                        <td><?= $t['transaksi_tgl']; ?></td>
                    </tr>
                    <tr>
                        <th>Tgl.Selesai</th>
                        <td>:</td>
                        <td><?= $t['transaksi_tgl_selesai']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?= $t['pelanggan_nama']; ?></td>
                    </tr>
                    <tr>
                        <th>No.HP</th>
                        <td>:</td>
                        <td><?= $t['pelanggan_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td><?= $t['pelanggan_alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Cucian(kg)</th>
                        <td>:</td>
                        <td><?= $t['transaksi_berat']; ?></td>
                    </tr>
                    <!-- <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>
                            <?php
                            if ($t['transaksi_status'] == "0") {
                                echo '<span class="badge badge-warning">PROSES</span>';
                            } else if ($t['transaksi_status'] == "1") {
                                echo '<span class="badge badge-primary">DICUCI</span>';
                            } else if ($t['transaksi_status'] == "2") {
                                echo '<span class="badge badge-success">SELESAI</span>';
                            }
                            ?>
                        </td>
                    </tr> -->
                    <tr>
                        <th>Harga</th>
                        <td>:</td>
                        <td>Rp. <?= $t['transaksi_harga']; ?>,-</td>
                    </tr>
                </table>
                <h3 class="mt-3 text-center">Daftar Cucian</h3>

                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <?php
                    $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id'");
                    while ($p = mysqli_fetch_array($pakaian)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $p['pakaian_jenis']; ?></td>
                                <td><?= $p['pakaian_jumlah']; ?></td>
                            </tr>
                        </tbody>

                    <?php } ?>
                </table>
                <!-- <h5 class="text-center mt-2">Terima kasih telah memercayai kami &#128512;</h5> -->
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Terima kasih telah menggunakan jasa kami <span>&#128516;</span></p>
                </blockquote>
            <?php } ?>

        </div>
    </div>
</div>
<?php require 'footer.php'; ?>