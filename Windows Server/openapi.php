<?php

include 'components/head.php';


require 'vendor/autoload.php';

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



<section class="section">
    <div class="section-header">
        <h1>Daftar Pasien Covid 19 Indonesia</h1>
    </div>
    <div class="section-table">
        <div class="card">
            <div class="card-header">
                <h4>source : api.covid19api.com</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="height: 600px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="9" style="text-align: center;">Kasus Harian</th>
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
                </div>
            </div>

        </div>


</section>



<?php
include 'components/foot.php'
?>