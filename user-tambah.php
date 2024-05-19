<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
if ($_POST) {
    $nama_user           =  $_POST['nama_user'];
    $username            = $_POST['username'];
    $password            = $_POST['password'];
    $level               = $_POST['level'];
    $foto                = $_POST['foto'];
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query_insert = $conn->query("INSERT INTO user (nama_user, username, password, level, foto)
                                VALUES('$nama_user', '$username', '$password', '$level', '$foto')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = '?menu=user';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = '?menu=user';
        </script>
        <?php
    }
}
?>
<h1>Form Input Siswa</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <label for="">Nama User</label>
    <input class="form-control" type="text" id="nama_user" name="nama_user">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Username</label>
    <input class="form-control" type="text" id="username" name="username">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Password</label>
    <input class="form-control" type="password" id="password" name="password">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">Level</label>
    <input class="form-control" type="text" id="level" name="level">
</div>
<div class="col bg-danger-subtle form-group mt-2">
    <label for="">foto</label>
    <input class="form-control" type="text" id="foto" name="foto">
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