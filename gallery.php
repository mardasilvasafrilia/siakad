<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h1>
    INI HALAMAN GALLERY.PHP
</h1>
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