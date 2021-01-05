<?php
require 'header.php';
require 'functions.php';
echo '<br>';
$pakaian = showData("SELECT * FROM pakaian");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-3">
                <div class="card-body">
                    <!-- Modal Insert Data -->
                    <div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="insertDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertDataLabel">Tambah Data Transaksi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="transaksi_tambah.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namaPelanggan">Nama Pelanggan</label>
                                            <select name="namaPelanggan" id="namaPelanggan" class="w-100">
                                                <option selected>==================PILIH==================</option>
                                                <?php
                                                $dataPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                                                while ($dp = mysqli_fetch_array($dataPelanggan)) { ?>
                                                    <option value="<?= $dp['pelanggan_id']; ?>"><?= $dp['pelanggan_nama']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="berat">Berat (kg)</label>
                                            <input type="number" class="form-control" id="berat" name="berat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglSelesai">Tgl. Selesai</label>
                                            <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" required>
                                        </div>
                                        <div class="form-group d-flex row">
                                            <div class="col-9">
                                                <label for="jenisPakaian">Jenis Pakaian</label>
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]" required>
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                                <input type="text" class="form-control mb-3" id="jenisPakaian" name="jenisPakaian[]">
                                            </div>
                                            <div class="col-3">
                                                <label for="jumlahPakaian">Jumlah</label>
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]" required>
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                                <input type="number" class="form-control mb-3" id="jumlahPakaian" name="jumlahPakaian[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- alert -->
                    <?php
                    if (isset($_GET['insert-transaksi'])) {
                        if ($_GET['insert-transaksi'] == 'berhasil') {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil ditambahkan
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        }
                    } else if (isset($_GET['update-transaksi'])) {
                        if ($_GET['update-transaksi'] == 'berhasil') {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil diubah
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        }
                    } else if (isset($_GET['hapus-data'])) {
                        if ($_GET['hapus-data'] == 'berhasil') {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil dihapus
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        }
                    }
                    ?>
                    <!-- akhir alert -->
                    <h2><i class="fas fa-money-check-alt"></i> Data Transaksi</h2>
                    <hr>
                    <!-- Button trigger modal insert data -->
                    <button type="button" class="btn btn-success mt-1 mb-3" data-toggle="modal" data-target="#insertData">
                        + Tambah Data
                    </button>
                    <table class="table table-bordered table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Berat (kg)</th>
                                <th scope="col">Tgl. Selesai</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $transaksi = mysqli_query($conn, "SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC");
                            while ($t = mysqli_fetch_array($transaksi)) {
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td>INVOICE-<?= $t['transaksi_id']; ?></td>
                                    <td><?= $t['transaksi_tgl']; ?></td>
                                    <td><?= $t['pelanggan_nama']; ?></td>
                                    <td><?= $t['transaksi_berat']; ?></td>
                                    <td><?= $t['transaksi_tgl_selesai']; ?></td>
                                    <td>Rp.<?= $t['transaksi_harga']; ?>,-</td>
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
                                    <td>
                                        <a href="transaksi_invoice.php?id=<?= $t['transaksi_id']; ?>" class="btn btn-info invoice">INVOICE</a>
                                        <a href="transaksi_edit.php?id=<?= $t['transaksi_id']; ?>" class="btn btn-primary editBtn">Ubah</a>
                                        <button class="btn btn-danger deleteData" data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                    </td>
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Pelanggan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="transaksi_hapus.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="transaksi_id" id="IDTransaksi">
                                                        </div>
                                                        <p>Apakah Anda yakin ingin menghapus data ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-danger" name="delete">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Hapus -->
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.deleteData').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        let data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        console.log(data[1]);
        let idTransaksi = data[1].length == 9 ? data[1].slice(-1) : data[1].slice(-2);
        console.log(idTransaksi);
        $('#IDTransaksi').val(idTransaksi);
    });
</script>
<?php require 'footer.php'; ?>