<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Form Inputan Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="text-center">Input Data (Sync)</h2>    
            <br>
                <br>

                <div class="form">
                    <form method="post" action="simpan.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No RM</label>
                            <input type="text" class="form-control" onkeyup="isi_otomatis()" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="radio" name="jenis_kelamin" value="L">Laki laki
                            <input type="radio" name="jenis_kelamin" value="P">Perempuan
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- <tr>
    <td>No RM</td>
    <td><input type="text" onkeyup="isi_otomatis()" name="nim"></td>
</tr>
<tr>
    <td>NAMA</td>
    <td><input type="text" name="nama"></td>
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td>
        <input type="radio" name="jenis_kelamin" value="L">Laki laki
        <input type="radio" name="jenis_kelamin" value="P">Perempuan
    </td>
</tr>

<tr>
    <td>ALAMAT</td>
    <td><input type="text" name="alamat" id=""></td>
</tr>
<tr>
    <td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td>
</tr> -->