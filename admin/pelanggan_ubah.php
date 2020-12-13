<?php
require 'functions.php';
if (isset($_POST['update'])) {
    if (updateData($_POST) > 0) {
        // echo "
        // <script>
        // alert('Data berhasil diubah !');
        // document.location.href = 'pelanggan.php';
        // </script>
        // ";
        header('Location:pelanggan.php?status-edit=berhasil');
    } else {
        echo "Data gagal diubah !";
        echo  mysqli_error($conn);
    }
}
