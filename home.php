<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_SESSION['login']=='sukses')
{
    ?>
    <h1>
        Selamat Datang Admin,
        <?php
        echo $_SESSION['nama_user'];
        ?>
    </h1>
    <?php
}
else
{
    ?>
   <script>
        window.location.href="index.php?menu=home";
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