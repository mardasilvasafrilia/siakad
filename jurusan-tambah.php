<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_POST) {
    $nama_jurusan           =  $_POST['nama_jurusan'];
    $created              = $_POST['created'];
    
    $query_insert = $conn->query("INSERT INTO jurusan (nama_jurusan, created_by)
                                VALUES('$nama_jurusan', '$created')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = '?menu=jurusan';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = '?menu=jurusan';
        </script>
        <?php
    }
}
?>
<h1>Form Input Jurusan</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <label for="">Jurusan</label>
    <input class="form-control" type="text" id="nama_jurusan" name="nama_jurusan">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Created</label>
    <input class="form-control" type="number" id="created" name="created">
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