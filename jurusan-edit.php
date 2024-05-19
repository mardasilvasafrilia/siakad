<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM jurusan WHERE id = '$id' ");
$data = $query_select->fetch_object();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $nama_jurusan           =  $_POST['nama_jurusan'];
    $created              = $_POST['created'];

    $query_update = $conn->query("UPDATE jurusan SET nama_jurusan        = '$nama_jurusan', 
                                                        created_by       = '$created'
                                                        WHERE id         = '$id'");
                                                        
    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=jurusan';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=jurusan';
        </script>
        <?php
    }

}
?>

<h1>Form Edit Jurusan</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <input type="text" name="id" value="<?= $data->id //$siswas['id']?>" hidden>
    <label for="">Jurusan</label>
    <input value="<?= $data->nama_jurusan //$siswas['nama']?>" class="form-control" type="text" id="nama_jurusan" name="nama_jurusan">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Created</label>
    <input value="<?= $data->created_by //$siswas['nama']?>" class="form-control" type="text" id="created" name="created">
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