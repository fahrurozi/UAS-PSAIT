<?php
include 'koneksi.php';
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$id_pasien = $_GET['id_pasien'];
$query= "DELETE from pasiens where id_pasien = '$id_pasien'";
mysqli_query($koneksi, $query);

$client = new Client();

    $response = $client->request(
        'DELETE',
        "192.168.56.69/api/sync/deletesync.php?id=".$id_pasien,
    );

header('location:index.php');

?>

