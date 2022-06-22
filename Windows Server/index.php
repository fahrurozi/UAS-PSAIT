<?php
include 'components/head.php'
?>

<section class="section">
    <div class="section-header">
        <h1>Daftar Pasien Covid 19</h1>
    </div>
    <div class="section-table">
        <div class="card">
            <div class="card-header">
                <a href="input.php" class="float-right btn btn-primary">Tambah Pasien (sync to remote server)</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h5>Local Database (Windows)</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>No RM</th>
                            <th width="30%">NAMA</th>
                            <th>GENDER</th>
                            <th>ALAMAT</th>
                            <th style="text-align: center;">ACTION</th>
                        </tr>
                        <?php

                        // Create connection 
                        include 'koneksi.php';

                        $mahasiswa = mysqli_query($koneksi, "SELECT * from pasiens");
                        $no = 1;

                        foreach ($mahasiswa as $row) {
                            $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki-laki';
                            echo "
                            <tr>
                                <td> $no </td>
                                <td>" . $row['nim'] . "</td>
                                <td>" . $row['nama'] . "</td>
                                <td>" . $jenis_kelamin . "</td>
                                <td>" . $row['alamat'] . "</td>
                                <td class='d-flex' style='justify-content: center; padding:12px;'>    
                                    <a class='btn btn-info' href='form-edit.php?id_pasien=$row[id_pasien]'>Edit</a> 
                                    &nbsp;
                                    <a class='btn btn-danger' href='delete.php?id_pasien=$row[id_pasien]'>Delete</a>
                                </td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>

        <!-- Ubuntu -->
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

        ?>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h5>Remote Database (Ubuntu)</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>No RM</th>
                            <th width="30%">NAMA</th>
                            <th>GENDER</th>
                            <th>ALAMAT</th>
                        </tr>
                        <?php foreach ($result as $item) {   $jenis_kelamin = $item->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki';?>
                            <tr>
                                <td><?php echo $item->id_pasien ?></td>
                                <td><?php echo $item->nim ?></td>
                                <td><?php echo $item->nama ?></td>
                                <td><?php echo $jenis_kelamin ?></td>
                                <td><?php echo $item->alamat ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
</section>

<?php
include 'components/foot.php'
?>