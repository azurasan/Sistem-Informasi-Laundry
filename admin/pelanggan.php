<?php
require 'header.php';
require 'functions.php';
$pelanggan = showData("SELECT * FROM pelanggan");
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
                                    <h5 class="modal-title" id="insertDataLabel">Tambah Data Pelanggan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="pelanggan_tambah.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namaPelanggan">Nama</label>
                                            <input type="text" class="form-control" id="namaPelanggan" aria-describedby="emailHelp" name="pelanggan_nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohpPelanggan">No. HP</label>
                                            <input type="number" class="form-control" id="nohpPelanggan" name="pelanggan_hp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatPelanggan">Alamat</label>
                                            <input type="text" class="form-control" id="alamatPelanggan" aria-describedby="emailHelp" name="pelanggan_alamat" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['status-insert'])) {
                        if (($_GET['status-insert']  == 'berhasil')) {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil ditambahkan
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Data gagal ditambahkan !
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                    }
                    if (isset($_GET['status-edit'])) {
                        if (($_GET['status-edit']  == 'berhasil')) {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil diubah
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Data gagal diubah !
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                    }
                    if (isset($_GET['status-delete'])) {
                        if (($_GET['status-delete']  == 'berhasil')) {
                            echo "<div class='alert alert-success' role='alert'>
                            Data berhasil dihapus
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Data gagal dihapus !
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                    }
                    ?>
                    <h1><i class="fas fa-users"></i> Data Pelanggan</h1>
                    <hr>
                    <!-- Button trigger modal insert data -->
                    <button type="button" class="btn btn-success mt-1 mb-3" data-toggle="modal" data-target="#insertData">
                        + Tambah Data
                    </button>
                    <!-- table pelanggan -->
                    <table class="table table-bordered table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No.HP</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan as $p) : ?>
                                <tr>
                                    <!-- untuk menampilkan nomor secara urut, tidak berdasarkan id di dalam database -->
                                    <td><?= $p["pelanggan_id"]; ?></td>
                                    <td><?= $p["pelanggan_nama"];  ?></td>
                                    <td><?= $p["pelanggan_hp"];  ?></td>
                                    <td><?= $p["pelanggan_alamat"];  ?></td>
                                    <td>
                                        <!-- button trigger edit data -->
                                        <button type="button" class="btn btn-primary editData" data-toggle="modal" data-target="#editModal">Ubah</button>
                                        <!-- Modal Edit Data -->
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Pelanggan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="pelanggan_ubah.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="pelanggan_id" id="editIDPelanggan">
                                                                <label for="editNamaPelanggan">Nama</label>
                                                                <input type="text" class="form-control" id="editNamaPelanggan" aria-describedby="emailHelp" name="pelanggan_nama" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editNoHPPelanggan">No. HP</label>
                                                                <input type="number" class="form-control" id="editNoHPPelanggan" name="pelanggan_hp" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editAlamatPelanggan">Alamat</label>
                                                                <input type="text" class="form-control" id="editAlamatPelanggan" aria-describedby="emailHelp" name="pelanggan_alamat" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="update">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit Data -->
                                        <!-- Modal Delete Data -->
                                        <button class="btn btn-danger deleteData" data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Pelanggan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="pelanggan_hapus.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="pelanggan_id" id="IDPelanggan">
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.editData').on('click', function() {
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#editIDPelanggan').val(data[0]);
            $('#editNamaPelanggan').val(data[1]);
            $('#editNoHPPelanggan').val(data[2]);
            $('#editAlamatPelanggan').val(data[3]);
        });

        $('.deleteData').on('click', function() {
            $('#deleteModal').modal('show');

            $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#IDPelanggan').val(data[0]);
        });
    });
</script>
<?php require 'footer.php'; ?>