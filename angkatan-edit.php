<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM angkatan WHERE id = '$id' ");
$data = $query_select->fetch_object();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $tahun_angkatan           =  $_POST['tahun_angkatan'];
    $created              = $_POST['created'];

    $query_update = $conn->query("UPDATE angkatan SET tahun_angkatan      = '$tahun_angkatan', 
                                                        created_by       = '$created'
                                                        WHERE id         = '$id'");
                                                        
    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=angkatan';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=angkatan';
        </script>
        <?php
    }

}
?>

<h1>Form Edit Angkatan</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <input type="text" name="id" value="<?= $data->id?>" hidden>
    <label for="">Tahun Angkatan</label>
    <input value="<?= $data->tahun_angkatan ?>" class="form-control" type="text" id="tahun_angkatan" name="tahun_angkatan">
</div>
    <input hidden value="<?= $_SESSION['id_user']?>" value="<?= $data->created_by //$siswas['nama']?>" class="form-control" type="text" id="created" name="created">
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