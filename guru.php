<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h3>Data Guru</h3>
<table class="table table-sm table-striped">
    <tr>
        <th>No.</th>
        <th>Nama Guru</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Tampat Lahir</th>
        <th>Alamat</th>
        <th>Pendidikan</th>
        <th>Mata Pelajaran</th>
        <th>No Tlp</th>
        <th>Email</th>
        <th>--Action--</th>
    </tr>
    <?php
    $hasil_query = $conn->query("SELECT * FROM guru");
    $no = 1;
    // while ($gurus = $hasil_query->fetch_assoc()) {
    foreach ($hasil_query as $gurus) {
        ?>
        <tr>
        <th><?php echo $no ?></th>
        <th><?php echo $gurus['nama_guru'] ?></th>
        <th><?php echo $gurus['jenis_kelamin'] ?></th>
        <th><?php echo $gurus['tgl_lahir'] ?></th>
        <th><?php echo $gurus['tempat_lahir'] ?></th>
        <th><?php echo $gurus['alamat'] ?></th>
        <th><?php echo $gurus['pendidikan'] ?></th>
        <th><?php echo $gurus['mapel_diampu'] ?></th>
        <th><?php echo $gurus['no_tlp'] ?></th>
        <th><?php echo $gurus['email'] ?></th>
        <th>
        <a style="text-decoration: none;" href="?menu=guru-edit&id=<?php echo $gurus['id']?>">
                <button class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </a>
            <a style="text-decoration: none;" href="?menu=guru-delete&id=<?php echo $gurus['id']?>" onclick="return confirm('Are You Sure?')">
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
    </tr>
</table>
<a href="?menu=guru-tambah">
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