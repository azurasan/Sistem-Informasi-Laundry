<?php
$conn = mysqli_connect("localhost", "root", "", "anandazulvansyahputra");

function showData($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertData($data)
{
    global $conn;

    $pelanggan_nama = $data['pelanggan_nama'];
    $pelanggan_hp = $data['pelanggan_hp'];
    $pelanggan_alamat = $data['pelanggan_alamat'];

    mysqli_query($conn, "INSERT INTO pelanggan VALUES ('','$pelanggan_nama','$pelanggan_hp','$pelanggan_alamat')");
    return mysqli_affected_rows($conn);
}

function updateData($data)
{
    global $conn;

    // mengambil id yang telah dikirim oleh pengguna
    $id = $data['pelanggan_id'];

    $pelanggan_nama = $data['pelanggan_nama'];
    $pelanggan_hp = $data['pelanggan_hp'];
    $pelanggan_alamat = $data['pelanggan_alamat'];

    mysqli_query($conn, "UPDATE pelanggan SET 
    pelanggan_nama = '$pelanggan_nama',
    pelanggan_hp = '$pelanggan_hp',
    pelanggan_alamat = '$pelanggan_alamat'
    WHERE pelanggan_id = $id;
    ");

    return mysqli_affected_rows($conn);
}

function deleteData($id)
{
    global $conn;
    // $id = $data['pelanggan_id'];
    mysqli_query($conn, "DELETE FROM pelanggan WHERE pelanggan_id=$id");

    return mysqli_affected_rows($conn);
}
