<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_POST) {
    $nama_kelas           =  $_POST['nama_kelas'];
    $created              = $_POST['created'];

    $query_insert = $conn->query("INSERT INTO kelas (nama_kelas, created_by)
                                VALUES('$nama_kelas', '$created')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = '?menu=kelas';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = '?menu=kelas';
        </script>
        <?php
    }
}
?>
<h1>Form Input Kelas</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <label for="">Nama Kelas</label>
    <input class="form-control" type="text" id="nama_kelas" name="nama_kelas">
</div>
    <input hidden value="<?= $_SESSION['id_user']?>" class="form-control" type="number" id="created" name="created">
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