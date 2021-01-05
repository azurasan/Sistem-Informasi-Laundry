<?php
require '../koneksi.php';
require 'header.php'
?>
<div class="container">
    <div class="card mt-3 d-print-none">
        <h4 class="m-3">Filter Laporan</h4>
        <div class="card-body">
            <form action="" method="get">
                <div class="form-group w-50 d-flex justify-content-between">
                    <label for="dari-tanggal">Dari Tanggal</label>
                    <input type="date" id="dari-tanggal" name="dari-tanggal">
                </div>
                <div class="form-group  w-50 d-flex justify-content-between">
                    <label for="sampai-tanggal">Sampai Tanggal</label>
                    <input type="date" id="sampai-tanggal" name="sampai-tanggal">
                </div>
                <button type="submit" name="filter" class="btn btn-primary w-50 mt-2">Filter</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET['dari-tanggal']) && isset($_GET['sampai-tanggal'])) {
        $dari = $_GET['dari-tanggal'];
        $sampai = $_GET['sampai-tanggal'];
    ?>
        <div class="card mt-3">
            <div class="card-body">
                <h4>Data Laporan dari <b><?= $dari; ?></b> s/d <b><?= $sampai; ?></b> </h4>
                <a href="#" class="btn btn-primary mt-2 mb-3 float-right d-print-none" onclick="window.print()"><i class="fas fa-print"></i> Cetak</a>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Tgl Selesai</th>
                            <th>Pelanggan</th>
                            <th>Berat (kg)</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($conn, "SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan = pelanggan_id AND date(transaksi_tgl) >= '$dari' AND date(transaksi_tgl) <= '$sampai' ORDER BY transaksi_id DESC");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                                <td><?= $d['transaksi_tgl']; ?></td>
                                <td><?= $d['transaksi_tgl_selesai']; ?></td>
                                <td><?= $d['pelanggan_nama']; ?></td>
                                <td><?= $d['transaksi_berat']; ?></td>
                                <td>Rp.<?= $d['transaksi_harga']; ?>,-</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
<?php require 'footer.php' ?>