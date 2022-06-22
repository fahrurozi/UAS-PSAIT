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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Update Data (Sync)</h2>
                <br>
                <br>
                <div class="form">
                    <form method="post" action="edit.php">
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
        </div>
    </div>
</body>

</html>

<!-- <form method="post" action="edit.php">
    <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien">
    <table>
        <tr>
            <td>No RM</td>
            <td><input type="text" value="<?php echo $row['nim']; ?>" name="nim"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" value="<?php echo $row['nama']; ?>" name="nama"></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?>>Laki laki
                <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?>>Perempuan
            </td>
        </tr>

        <tr>
            <td>ALAMAT</td>
            <td><input value="<?php echo $row['alamat']; ?>" type="text" name="alamat" </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                <a href="index.php">Kembali</a>
            </td>
        </tr>

    </table>
</form> -->