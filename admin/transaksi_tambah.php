<?php
require '../koneksi.php';
$pelanggan = $_POST['namaPelanggan'];
$berat = $_POST['berat'];
$tglHariIni = date('Y-m-d');
$tglSelesai = $_POST['tglSelesai'];
$status = 0;
$h = mysqli_query($conn, "SELECT harga_per_kilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);
$harga = $berat * $harga_per_kilo['harga_per_kilo'];
$queryTransaksi = "INSERT INTO transaksi SET 
transaksi_tgl = '$tglHariIni',
transaksi_pelanggan = '$pelanggan',
transaksi_harga = '$harga',
transaksi_berat = '$berat',
transaksi_tgl_selesai = '$tglSelesai',
transaksi_status = '$status'";
$tambahDataTransaksi = mysqli_query($conn, $queryTransaksi) or die(mysqli_error($conn));;
$idTerakhir = mysqli_insert_id($conn);
$jenisPakaian = $_POST['jenisPakaian'];
$jumlahPakaian = $_POST['jumlahPakaian'];

for ($x = 0; $x < count($jenisPakaian); $x++) {
    if ($jenisPakaian[$x] != "") {
        mysqli_query($conn, "INSERT INTO pakaian SET 
        pakaian_transaksi = '$idTerakhir',
        pakaian_jenis = '$jenisPakaian[$x]',
        pakaian_jumlah = '$jumlahPakaian[$x]'")
            or die(mysqli_error($conn));;
    }
}
if ($tambahDataTransaksi) {
    header('Location:transaksi.php?insert-transaksi=berhasil');
}
