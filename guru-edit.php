<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM guru WHERE id = '$id' ");
$gurus = $query_select->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $id         = $_POST['id'];
    $nama       = $_POST['nama_guru'];
    $jk         = $_POST['jk'];
    $tgl_lahir  = $_POST['tanggal'];
    $alamat     = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat'];
    $pendidikan = $_POST['pendidikan'];
    $mapel      = $_POST['mapel'];
    $no_tlp     = $_POST['no_tlp'];
    $email      = $_POST['email'];

    $query_update = $conn->query("UPDATE guru SET nama_guru   = '$nama', 
                                                jenis_kelamin = '$jk',
                                                tgl_lahir     = '$tgl_lahir',
                                                alamat        = '$alamat',
                                                tempat_lahir  = '$tempat_lahir',
                                                pendidikan    = '$pendidikan',
                                                mapel_diampu  = '$mapel',
                                                no_tlp        = '$no_tlp',
                                                email         = '$email'
                                            WHERE id          = '$id'");
    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=guru';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=guru';
        </script>
        <?php
    }

}
?>

<h1>Form Edit Guru</h1>

<form action="" method="post">
<div class="col bg-primary-subtle form-group">
    <input type="text" name="id" value="<?= $gurus['id']?>" hidden>
    <label for="">Nama guru</label>
    <input value="<?= $gurus['nama_guru']?>" class="form-control" type="text" id="nama_guru" name="nama_guru"></div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Jenis Kelamin</label>
    <select class="form-control" type="text" id="jk" name="jk">
    <option value="<?= $gurus['jenis_kelamin']?>"><?= $gurus['jenis_kelamin']?></option>
    <option value="L">Laki - Laki</option>
    <option value="P">Perempuan</option>
    </select>
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Tanggal Lahir</label>
    <input value="<?= $gurus['tgl_lahir']?>" class="form-control" type="date" id="tanggal" name="tanggal">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Tempat Lahir</label>
    <input value="<?= $gurus['tempat_lahir']?>" class="form-control" type="text" id="tempat" name="tempat">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Alamat</label>
    <textarea value="<?= $gurus['alamat']?>" class="form-control" id="alamat" name="alamat"><?= $gurus['alamat']?></textarea>
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Pendidikan</label>
    <input value="<?= $gurus['pendidikan']?>" class="form-control" type="text" id="pendidikan" name="pendidikan">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Mata Pelajaran</label>
    <input value="<?= $gurus['mapel_diampu']?>" class="form-control" type="text" id="mapel" name="mapel">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">No Tlp</label>
    <input value="<?= $gurus['no_tlp']?>" class="form-control" type="number" id="np_tlp" name="no_tlp">
</div>
<div class="col bg-primary-subtle form-group mt-2">
    <label for="">Email</label>
    <input value="<?= $gurus['email']?>" class="form-control" type="text" id="email" name="email">
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