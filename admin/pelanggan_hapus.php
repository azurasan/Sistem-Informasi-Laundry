<?php

require '../koneksi.php';

if (isset($_POST['delete'])) {
	$id = $_POST['pelanggan_id'];

	$query = "DELETE FROM pelanggan WHERE pelanggan_id= $id";
	$deleteQuery = mysqli_query($conn, $query);
	if ($deleteQuery) {
		header('Location:pelanggan.php?status-delete=berhasil');
	} else {
		echo "Data gagal dihapus";
	}
};
