<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h1>Proses delete</h1>

<?php
echo "ID SISWA = ". $_GET['id'];

$id = $_GET['id'];

$query_delete = $conn->query("DELETE FROM siswa WHERE id = '$id'");
if ($query_delete) {
    ?>
    <script>
        window.alert('Data Berhasil di Hapus');
        window.location.href='?menu=siswa';
    </script>
    <?php
}else {
    ?>
    <script>
         window.alert('Data Gagal di Hapus');
        window.location.href='?menu=siswa';
    </script>
    <?php
}
?>
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