<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h1>Proses delete</h1>

<?php
echo "ID ANGKATAN = ". $_GET['id'];

$id = $_GET['id'];

$query_delete = $conn->query("DELETE FROM angkatan WHERE id = '$id'");
if ($query_delete) {
    ?>
    <script>
        window.alert('Data Berhasil di Hapus');
        window.location.href='?menu=angkatan';
    </script>
    <?php
}else {
    ?>
    <script>
         window.alert('Data Gagal di Hapus');
        window.location.href='?menu=angkatan';
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