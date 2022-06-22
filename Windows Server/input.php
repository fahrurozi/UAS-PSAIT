<?php
include 'components/head.php'
?>

<section class="section">
        <div class="section-header">
            <h1>Tambah Pasien Baru</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="simpan.php" method="post" enctype="multipart/form-data">
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
</section>

<?php
include 'components/foot.php'
?>
