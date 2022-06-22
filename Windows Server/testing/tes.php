<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
    'GET',
    'http://192.168.56.69/api/sync/readsync.php'
);

// var_dump($response);

$body_json = $response->getBody();
$result = json_decode($body_json);


foreach($result as $item){
    echo $item->nim . "<br>";
    echo $item->nama . "<br>";
    echo $item->jenis_kelamin . "<br>";
    echo $item->alamat . "<br>";
}
// $data = $result->data;
// $update = $result->update;
// $penambahan = $update->penambahan;
// $total = $update->total;
// $harian = array_reverse($update->harian);
?>