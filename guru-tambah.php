<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_POST) {
    echo $nama           =  $_POST['nama'];
    echo $jk             = $_POST['jk'];
    echo $tgl_lahir   = $_POST['tanggal'];
    echo $tempat_lahir   = $_POST['tempat'];
    echo $alamat         = $_POST['alamat'];
    echo $pendidikan   = $_POST['pendidikan'];
    echo $mapel   = $_POST['mapel'];
    echo $no_tlp   = $_POST['no_tlp'];
    echo $email   = $_POST['email'];


    $query_insert = $conn->query("INSERT INTO guru (nama_guru, jenis_kelamin, tgl_lahir, tempat_lahir, alamat, pendidikan, mapel_diampu, no_tlp, email)
                                VALUES('$nama', '$jk', '$tgl_lahir', '$tempat_lahir', '$alamat', '$pendidikan', '$mapel', '$no_tlp', '$email')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = '?menu=guru';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = '?menu=guru';
        </script>
        <?php
    }
}
?>
<h1>Form Input Guru</h1>

<form action="" method="post">
<div class="col bg-primary-subtle form-group">
    <label for="">Nama guru</label>
    <input class="form-control" type="text" id="nama" name="nama">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Jenis Kelamin</label>
    <select class="form-control" type="text" id="jk" name="jk">
    <option value="">--Pilih Jenis Kelamin--</option>
    <option value="L">Laki - Laki</option>
    <option value="P">Perempuan</option>
    </select>
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Tanggal Lahir</label>
    <input class="form-control" type="date" id="tanggal" name="tanggal">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Tempat Lahir</label>
    <input class="form-control" type="text" id="tempat" name="tempat">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat"></textarea>
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Pendidikan</label>
    <input class="form-control" type="text" id="pendidikan" name="pendidikan">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Mata Pelajaran</label>
    <input class="form-control" type="text" id="mapel" name="mapel">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">No Tlp</label>
    <input class="form-control" type="number" id="np_tlp" name="no_tlp">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Email</label>
    <input class="form-control" type="text" id="email" name="email">
</div>
<div class="form-group mt-2">
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
<?php
}
else {
  ?>
  <script>
    window.location.href="login.php?menu=home";
  </script>
  <?php
}
?>