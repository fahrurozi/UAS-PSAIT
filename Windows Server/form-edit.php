<?php
include 'koneksi.php';

$id = $_GET['id_pasien'];
$pasien = mysqli_query($koneksi, "select * from pasiens where id_pasien = '$id'");
$row = mysqli_fetch_array($pasien);


function active_radio_button($value, $input)
{
    $result = $value == $input ? 'checked' : '';
    return $result;
}

?>


<?php
include 'components/head.php'
?>

<section class="section">
    <div class="section-header">
        <h1>Edit Data Pasien</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien">
                <div class="form-group">
                    <label for="exampleInputEmail1">No RM</label>
                    <input type="text" class="form-control" onkeyup="isi_otomatis()" name="nim" value="<?php echo $row['nim']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" name="nama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?>>Laki laki
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?>>Perempuan
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="" value="<?php echo $row['alamat']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<?php
include 'components/foot.php'
?>