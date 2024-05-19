<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h3>Data Siswa</h3>
<table class="table table-sm table-striped">
    <tr>
        <th>No.</th>
        <th>NIS</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tempat tinggal</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No Tlp</th>
        <th>Email</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
        <th>Created</th>
        <th>--Action--</th>
    </tr>
    <?php
    $hasil_query = $conn->query("SELECT siswa.nis as nis , siswa.nisn as nisn, 
                                        siswa.nama as nama , siswa.jenis_kelamin as jk,
                                        siswa.tempat_lahir as tempat_lahir , siswa.tgl_lahir as tgl_lahir,
                                        siswa.alamat as alamat , siswa.tlp as tlp, siswa.email as email,
                                        siswa.created_by as crtby, siswa.id as id,
                                        kelas.nama_kelas as n_kls,
                                        jurusan.nama_jurusan as n_jurusan,
                                        angkatan.tahun_angkatan as thn_angkatan
                                 FROM siswa
                                 jOIN kelas ON siswa.kelas_id = kelas.id
                                 JOIN jurusan ON siswa.jurusan_id= jurusan.id
                                 JOIN angkatan On siswa.angkatan_id = angkatan.id
                                 ");
    $no = 1;
    // while ($siswas = $hasil_query->fetch_assoc()) { //menggunakan looping prosedural
    // foreach ($hasil_query as $siswas) {             //menggunakan looping foreach prosedural
        while ($siswas = $hasil_query->fetch_object()) { // menggunakan looping while Object Oriented
        ?>
        <tr>
            <!--Looping menggunakan Object Oriented atau Prosedural-->
        <th><?= $no ?></th>
        <th><?=  $siswas->nis//$siswas['alamat'] ?></th>
        <th><?=  $siswas->nisn?></th>
        <th><?=  $siswas->nama //$siswas['nama'] ?></th>
        <th><?=  $siswas->jk //$siswas['jenis_kelamin'] ?></th>
        <th><?=  $siswas->tempat_lahir?></th>
        <th><?=  $siswas->tgl_lahir//$siswas['tgl_lahir'] ?></th>
        <th><?=  $siswas->alamat//$siswas['alamat'] ?></th>
        <th><?=  $siswas->tlp?></th>
        <th><?=  $siswas->email?></th>
        <th><?=  $siswas->n_kls?></th>
        <th><?=  $siswas->n_jurusan?></th>
        <th><?=  $siswas->thn_angkatan?></th>
        <th><?=  $siswas->crtby?></th>
        <th>
            <a style="text-decoration: none;" href="?menu=siswa-edit&id=<?php echo $siswas->id?>">
                <button class="btn btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
            </button>
            </a>
            <a style="text-decoration: none;" href="?menu=siswa-delete&id=<?php echo $siswas->id?>" onclick="return confirm('Are You Sure?')">
                <button class="btn btn-danger">
                <i class="fa-solid fa-trash-can"></i>
                </button>
            </a>
        </th>
    </tr>
    <?php
    $no++;
    }
    ?>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>
<a href="?menu=siswa-tambah">
    <button class="btn btn-success mb-1"><i class="fa-solid fa-user-plus"></i> Tambah</button>
</a>
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