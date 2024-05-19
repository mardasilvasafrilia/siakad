<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM kelas WHERE id = '$id' ");
$data = $query_select->fetch_object();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $nama_kelas           =  $_POST['nama_kelas'];
    $created              = $_POST['created'];

    $query_update = $conn->query("UPDATE kelas SET nama_kelas        = '$nama_kelas', 
                                                    created_by       = '$created'
                                                    WHERE id         = '$id'");
    
    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=kelas';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=kelas';
        </script>
        <?php
    }

}
?>

<h1>Form Edit Kelas</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <input type="text" name="id" value="<?= $data->id //$siswas['id']?>" hidden>
    <label for="">Nama Kelas</label>
    <input value="<?= $data->nama_kelas //$siswas['nama']?>" class="form-control" type="text" id="nama_kelas" name="nama_kelas">
</div>
    <input hidden value="<?= $_SESSION['id_user']?>"  value="<?= $data->created_by //$siswas['nama']?>" class="form-control" type="text" id="created" name="created">
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