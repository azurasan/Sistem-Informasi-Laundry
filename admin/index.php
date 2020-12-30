<?php
require '../koneksi.php';
require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3"><i class="fas fa-home"></i> Dashboard</h3>
                    <div class="cards d-lg-flex">
                        <div class="card mx-2 border border-primary">
                            <div class="card-body">
                                <div class="header d-flex justify-content-between">
                                    <h2><i class="fas fa-user"></i></h2>
                                    <h2>
                                        <?php
                                        $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                                        ?>
                                        <?= mysqli_num_rows($pelanggan); ?>
                                    </h2>
                                </div>
                                <h2>Jumlah Pelanggan</h2>
                            </div>
                        </div>
                        <div class="card mx-2 border border-warning">
                            <div class="card-body">
                                <div class="header d-flex justify-content-between">
                                    <h2><i class="fas fa-task"></i></h2>
                                    <h2>
                                        <?php
                                        $proses = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_status = '0'");
                                        ?>
                                        <?= mysqli_num_rows($proses); ?>
                                    </h2>
                                </div>
                                <h2>Cucian di Proses</h2>
                            </div>
                        </div>
                        <div class="card mx-2 border border-secondary">
                            <div class="card-body">
                                <div class="header d-flex justify-content-between">
                                    <h2><i class="fas fa-tasks"></i></h2>
                                    <h2>
                                        <?php
                                        $proses = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_status = '1'");
                                        ?>
                                        <?= mysqli_num_rows($proses); ?>
                                    </h2>
                                </div>
                                <h2>Cucian Siap Ambil</h2>
                            </div>
                        </div>
                        <div class="card mx-2 border border-success">
                            <div class="card-body">
                                <div class="header d-flex justify-content-between">
                                    <h2><i class="fas fa-check-circle"></i></h2>
                                    <h2>
                                        <?php
                                        $proses = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_status = '1'");
                                        ?>
                                        <?= mysqli_num_rows($proses); ?>
                                    </h2>
                                </div>
                                <h2>Cucian Selesai</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-title">
                    <h3 class="ml-3 mt-3 mb-1"><i class="fas fa-history"></i> Riwayat Transaksi Terakhir</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>No.Invoice</th>
                                <th>Pelangggan</th>
                                <th>Tanggal</th>
                                <th>Tgl Selesai</th>
                                <th>Berat</th>
                                <th>Status</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($conn, "SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC LIMIT 5");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                                    <td><?= $d['pelanggan_nama']; ?></td>
                                    <td><?= $d['transaksi_tgl']; ?></td>
                                    <td><?= $d['transaksi_tgl_selesai']; ?></td>
                                    <td><?= $d['transaksi_berat']; ?></td>
                                    <td>
                                        <?php
                                        if ($d['transaksi_status'] == "0") {
                                            echo '<span class="badge badge-warning">PROSES</span>';
                                        } else if ($d['transaksi_status'] == "1") {
                                            echo '<span class="badge badge-primary">DICUCI</span>';
                                        } else if ($d['transaksi_status'] == "2") {
                                            echo '<span class="badge badge-success">SELESAI</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $d['transaksi_harga']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>