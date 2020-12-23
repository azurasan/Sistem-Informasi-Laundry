<?php
require '../koneksi.php';
$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tglSelesai = $_POST['tglSelesai'];
$status = $_POST['status'];
$h = mysqli_query($conn, "SELECT harga_per_kilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);
$harga = $berat * $harga_per_kilo['harga_per_kilo'];
$updateTransaksi = mysqli_query($conn, "UPDATE TRANSAKSI SET transaksi_pelanggan = '$pelanggan',
transaksi_harga='$harga',
transaksi_berat = '$berat',
transaksi_tgl_selesai = '$tglSelesai',
transaksi_status = '$status' WHERE transaksi_id = '$id'");
$updatePakaian = mysqli_query($conn, "DELETE FROM pakaian WHERE pakaian_transaksi = '$id'") or die(mysqli_error($conn));;
$jenisPakaian = $_POST['jenisPakaian'];
$jumlahPakaian = $_POST['jumlahPakaian'];
for ($x = 0; $x < count($jenisPakaian); $x++) {
    if ($jenisPakaian[$x] != "") {
        mysqli_query($conn, "INSERT INTO pakaian SET 
        pakaian_transaksi = '$id',
        pakaian_jenis = '$jenisPakaian[$x]',
        pakaian_jumlah = '$jumlahPakaian[$x]'")
            or die(mysqli_error($conn));
    }
}
// if ($updateTransaksi) {
//     header('Location:transaksi.php?update-transaksi=berhasil');
// }
header('Location:transaksi.php?update-transaksi=berhasil');
