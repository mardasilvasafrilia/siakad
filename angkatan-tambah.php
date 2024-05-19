<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_POST) {
    $tahun_angkatan           =  $_POST['tahun_angkatan'];
    $created              = $_POST['created'];

    $query_insert = $conn->query("INSERT INTO angkatan (tahun_angkatan, created_by)
                                VALUES('$tahun_angkatan', '$created')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = '?menu=angkatan';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = '?menu=angkatan';
        </script>
        <?php
    }
}
?>
<h1>Form Input Kelas</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <label for="">Tahun Angkatan</label>
    <input class="form-control" type="number" id="tahun_angkatan" name="tahun_angkatan">
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