<?php
require '../koneksi.php';
require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 m-auto">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="heading d-flex justify-content-between">
                        <h2>Ubah Data Transaksi</h2>
                        <a href="transaksi.php" class="btn btn-primary my-2">Kembali</a>
                    </div>

                    <?php
                    $id = $_GET['id'];
                    $dataTransaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE transaksi_id = '$id'");
                    while ($dt = mysqli_fetch_array($dataTransaksi)) {
                    ?>
                        <form action="transaksi_update.php" method="post" class="mt-2">
                            <input type="hidden" name="id" value="<?= $dt['transaksi_id']; ?>">
                            <div class="form-group">
                                <label for="pelanggan" class="font-weight-bold">Pelanggan</label>
                                <select name="pelanggan" id="pelanggan" required class="w-100">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php
                                    $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                                    while ($p = mysqli_fetch_array($pelanggan)) {
                                    ?>
                                        <option <?php if ($p['pelanggan_id'] == $dt['transaksi_pelanggan']) {
                                                    echo "selected='selected'";
                                                } ?> value="<?= $p['pelanggan_id']; ?>"><?= $p['pelanggan_nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="berat" class="font-weight-bold">Berat (kg)</label>
                                <input type="number" class="form-control" id="berat" name="berat" required value="<?= $dt['transaksi_berat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tglSelesai">Tgl. Selesai</label>
                                <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" required value="<?= $dt['transaksi_tgl_selesai']; ?>">
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Jenis Pakaian</th>
                                    <th width="20%">Jumlah</th>
                                </tr>
                                <?php
                                $id_transaksi = $dt['transaksi_id'];
                                $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id_transaksi'");
                                while ($dataPakaian = mysqli_fetch_array($pakaian)) {
                                ?>
                                    <tr>
                                        <td><input type="text" name="jenisPakaian[]" value="<?= $dataPakaian['pakaian_jenis']; ?>"></td>
                                        <td><input type="number" name="jumlahPakaian[]" value="<?= $dataPakaian['pakaian_jumlah']; ?>"></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="jenisPakaian[]"></td>
                                    <td><input type="number" name="jumlahPakaian[]"></td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Status</label>
                                <select name="status" id="" class="w-100">
                                    <option <?php if ($dt['transaksi_status'] == "0") {
                                                echo "selected='selected'";
                                            } ?> value="0">PROSES</option>
                                    <option <?php if ($dt['transaksi_status'] == "1") {
                                                echo "selected='selected'";
                                            } ?> value="1">DICUCI</option>
                                    <option <?php if ($dt['transaksi_status'] == "2") {
                                                echo "selected='selected'";
                                            } ?> value="2">SELESAI</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </form>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>