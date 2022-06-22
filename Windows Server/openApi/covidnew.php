<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
    'GET',
    'https://api.covid19api.com/country/indonesia'
);

$body_json = $response->getBody();
$result = json_decode($body_json);

$data_indonesia = array_reverse($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2 style="text-align: center;">COVID INDONESIA</h2>
        <!-- <table class="table">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;">Penambahan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Jumlah Positif</th>
                    <td style="text-align: center;"><?php echo $penambahan->jumlah_positif ?></td>
                </tr>
                <tr>
                    <th>Jumlah Meninggal</th>
                    <td style="text-align: center;"><?php echo $penambahan->jumlah_meninggal ?></td>
                </tr>
                <tr>
                    <th>Jumlah Sembuh</th>
                    <td style="text-align: center;"><?php echo $penambahan->jumlah_sembuh ?></td>
                </tr>
                <tr>
                    <th>Jumlah Dirawat</th>
                    <td style="text-align: center;"><?php echo $penambahan->jumlah_dirawat ?></td>
                </tr>
            </tbody>
        </table> -->
        <div class="span3" style="height: 900px; overflow: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="9" style="text-align: center;">Kasian Harian</th>
                    </tr>
                    <tr>
                        <th style="text-align: center; width:20%">Tanggal</th>
                        <th style="text-align: center;">Jumlah Meninggal</th>
                        <th style="text-align: center;">Jumlah Sembuh</th>
                        <th style="text-align: center;">Jumlah Positif</th>
                        <th style="text-align: center;">Jumlah Terkonfirmasi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($data_indonesia as $row) {
                        echo "<tr>";
                        echo "<th style='text-align: center;''>" . date("d-m-Y", strtotime($row->Date)) . "</th>";
                        echo "<td style='text-align: center;'>" . $row->Deaths . "</td>";
                        echo "<td style='text-align: center;'>" . $row->Recovered . "</td>";
                        echo "<td style='text-align: center;'>" . $row->Active . "</td>";
                        echo "<td style='text-align: center;'>" . $row->Confirmed . "</td>";
                        
                        echo "</tr>";;
                    }
                    ?>
                    
                </tbody>
            </table>
        <!-- </div>
        <table class="table">
            <tr>
                <td colspan="9"></td>
            </tr>
            <tr>
                <th colspan="7">Jumlah Positif</th>
                <td colspan="2" style="text-align: center;"><?php  ?></td>
            </tr>
            <tr>
                <th colspan="7">Jumlah Dirawat</th>
                <td colspan="2" style="text-align: center;"><?php  ?></td>
            </tr>
            <tr>
                <th colspan="7">Jumlah Sembuh</th>
                <td colspan="2" style="text-align: center;"><?php  ?></td>
            </tr>
            <tr>
                <th colspan="7">Jumlah Meninggal</th>
                <td colspan="2" style="text-align: center;"><?php //echo $total->jumlah_meninggal ?></td>
            </tr>
        </table> -->
    </div>

</body>

</html>