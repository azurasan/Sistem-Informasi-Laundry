<?php
// require 'functions.php';
// if (isset($_POST['delete'])) {
// 	if (deleteData($_POST) > 0) {
// 		echo "
// 			<script>
// 			alert('Data berhasil dihapus !');
// 			document.location.href = 'pelanggan.php';
// 			</script>
// 			";
// 	} else {
// 		echo "Data gagal dihapus !";
// 	}
// }
$conn = mysqli_connect("localhost", "root", "", "anandazulvansyahputra");

if (isset($_POST['delete'])) {
	$id = $_POST['pelanggan_id'];

	$query = "DELETE FROM pelanggan WHERE pelanggan_id= $id";
	$deleteQuery = mysqli_query($conn, $query);
	if ($deleteQuery) {
		// 	echo "<script>
		// alert('Data berhasil dihapus !');
		// document.location.href = 'pelanggan.php';
		// </script>";
		header('Location:pelanggan.php?status-delete=berhasil');
	} else {
		echo "Data gagal dihapus";
	}
};
