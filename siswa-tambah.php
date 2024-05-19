<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h1>Form Input Siswa</h1>

<form action="siswa-tambah-proses.php" method="post">
<div class="col bg-danger-subtle form-group">
    <label for="">NIS</label>
    <input class="form-control" type="text" id="nis" name="nis">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">NISN</label>
    <input class="form-control" type="text" id="nisn" name="nisn">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Nama Siswa</label>
    <input class="form-control" type="text" id="nama" name="nama">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Jenis Kelamin</label>
    <select class="form-control" type="text" id="jk" name="jk">
    <option value="">--Pilih Jenis Kelamin--</option>
    <option value="L">Laki - Laki</option>
    <option value="P">Perempuan</option>
    </select>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Tempat Lahir</label>
    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Tanggal Lahir</label>
    <input class="form-control" type="date" id="tanggal" name="tanggal">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat"></textarea>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">No Tlp</label>
    <input class="form-control" type="number" id="tlp" name="tlp">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Email</label>
    <input class="form-control" type="text" id="email" name="email">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Kelas Siswa</label>
    <select class="form-control" type="text" id="kelas" name="kelas">
    <option value="">--Pilih Kelas--</option>
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
    <label for="">Jurusan Siswa</label>
    <select class="form-control" type="text" id="jurusan" name="jurusan">
    <option value="">--Pilih Jurusan--</option>
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
    <option value="">--Pilih Angkatan--</option>
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
    <label for="">Angkatan Created</label>
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