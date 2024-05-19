<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM siswa WHERE id = '$id' ");
$siswas = $query_select->fetch_object();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $id         = $_POST['id'];
    $nis            =  $_POST['nis'];
    $nisn           =  $_POST['nisn'];
    $nama           =  $_POST['nama'];
    $jk             = $_POST['jk'];
    $tempat_lahir   =  $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tanggal'];
    $alamat         = $_POST['alamat'];
    $tlp            =  $_POST['tlp'];
    $email          =  $_POST['email'];
    $kelas          =  $_POST['kelas'];
    $jurusan        =  $_POST['jurusan'];
    $angkatan       =  $_POST['angkatan'];
    $created        = $_POST['created'];

    $query_update = $conn->query("UPDATE siswa SET nis        ='$nis',
                                                nisn          ='$nisn',
                                                nama          ='$nama', 
                                                jenis_kelamin ='$jk',
                                                tempat_lahir  ='$tempat_lahir',
                                                tgl_lahir     ='$tgl_lahir',
                                                alamat        ='$alamat',
                                                tlp           ='$tlp',
                                                email         ='$email',
                                                kelas_id      ='$kelas',
                                                jurusan_id    ='$jurusan',
                                                angkatan_id   ='$angkatan',
                                                created_by    ='$created'
                                            WHERE id          = '$id'");
    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=siswa';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=siswa';
        </script>
        <?php
    }

}
?>

<h1>Form Edit Siswa</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <input type="text" name="id" value="<?= $siswas->id //$siswas['id']?>" hidden>
    <label for="">Nama Siswa</label>
    <input value="<?= $siswas->nama //$siswas['nama']?>" class="form-control" type="text" id="nama" name="nama">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">NIS</label>
    <input value="<?= $siswas->nis //$siswas['nama']?>" class="form-control" type="text" id="nis" name="nis">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">NISN</label>
    <input value="<?= $siswas->nisn //$siswas['nama']?>" class="form-control" type="text" id="nisn" name="nisn">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Jenis Kelamin</label>
    <select class="form-control" type="text" id="jk" name="jk">
    <option value="<?= $siswas->jenis_kelamin //$siswas['jenis_kelamin']?>"><?= $siswas->jenis_kelamin //$siswas['jenis_kelamin']?></option>
    <option value="L">Laki - Laki</option>
    <option value="P">Perempuan</option>
    </select>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Tempat Lahir</label>
    <input value="<?= $siswas->tempat_lahir //$siswas['nama']?>" class="form-control" type="text" id="tempat_lahir" name="tempat_lahir">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Tanggal Lahir</label>
    <input value="<?= $siswas->tgl_lahir //$siswas['tgl_lahir']?>" class="form-control" type="date" id="tanggal" name="tanggal">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Alamat</label>
    <textarea value="<?= $siswas->alamat //$siswas['alamat']?>" class="form-control" id="alamat" name="alamat"><?= $siswas->alamat //$siswas['alamat']?></textarea>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">No Tlp</label>
    <input value="<?= $siswas->tlp //$siswas['nama']?>" class="form-control" type="number" id="tlp" name="tlp">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Email</label>
    <input value="<?= $siswas->email //$siswas['nama']?>" class="form-control" type="text" id="email" name="email">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Kelas</label>
    <select class="form-control" type="number" id="kelas" name="kelas">
    <option value="<?= $siswas->kelas_id ?>" >--Nama Kelas--</option>
    <?php
    $query_kelas = $conn->query("SELECT * FROM kelas");
    while ($data = $query_kelas->fetch_object()) {
        ?>
        <option value="<?=$data->id ?>"><?= $data->nama_kelas?></option>
        <?php
    }
    ?>
    </select>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Jurusan</label>
    <select class="form-control" type="text" id="jurusan" name="jurusan">
    <option value="<?= $siswas->jurusan_id ?>" >--Nama Jurusan--</option>
    <?php
    $query_jurusan = $conn->query("SELECT * FROM jurusan");
    while ($data = $query_jurusan->fetch_object()) {
        ?>
        <option value="<?=$data->id ?>"><?= $data->nama_jurusan?></option>
        <?php
    }
    ?>
    </select>
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Tahun Angkatan</label>
    <select class="form-control" type="text" id="angkatan" name="angkatan">
    <option value="<?= $siswas->angkatan_id ?>" >--Tahun Angkatan--</option>
    <?php
    $query_angkatan = $conn->query("SELECT * FROM angkatan");
    while ($data = $query_angkatan->fetch_object()) {
        ?>
        <option value="<?=$data->id ?>"><?= $data->tahun_angkatan?></option>
        <?php
    }
    ?>
    </select>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Created</label>
    <input value="<?= $siswas->created_by //$siswas['nama']?>" class="form-control" type="text" id="created" name="created">
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