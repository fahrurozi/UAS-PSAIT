<?php 
include 'koneksi.php';
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$id_pasien   = $_POST['id_pasien'];
$nim            = $_POST['nim'];
$nama            = $_POST['nama'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
// query SQL untuk insert data
$query="UPDATE pasiens SET nim='$nim',nama='$nama',jenis_kelamin='$jenis_kelamin',alamat='$alamat' where id_pasien='$id_pasien'";
mysqli_query($koneksi, $query);

$client = new Client();

$response = $client->request(
    'PUT',
    "192.168.56.69/api/sync/updatesync.php",
    [
        'json' => [
            'id' => $id_pasien,
            'nim' => $nim,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat
        ]
    ]
);
// mengalihkan ke halaman index.php
header("location:index.php");
?>
