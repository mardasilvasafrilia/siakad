<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<?php
//proses tampil data
$id = $_GET['id'];
$query_select= $conn->query("SELECT * FROM user WHERE id = '$id' ");
$data = $query_select->fetch_object();
////////////////////////////////////////////////////////////////////////////////////////////
//proses update data
if ($_POST) {
    $nama_user           =  $_POST['nama_user'];
    $username            = $_POST['username'];
    $password            = $_POST['password'];
    $level               = $_POST['level'];
    $foto                = $_POST['foto'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($password == '') {
        $query_update = $conn->query("UPDATE user SET nama_user  = '$nama_user', 
                                                        username     = '$username',
                                                        password     = '$password',
                                                        level        = '$level',
                                                        foto         = '$foto'
                                                        WHERE id         = '$id'");
    }else {
        $query_update = $conn->query("UPDATE user SET nama_user  = '$nama_user', 
                                                        username     = '$username',
                                                        password     = '$password',
                                                        level        = '$level',
                                                        foto         = '$foto'
                                                        WHERE id         = '$id'");
    }

    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '?menu=user';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '?menu=user';
        </script>
        <?php
    }

}
?>

<h1>Form Edit User</h1>

<form action="" method="post">
<div class="col bg-danger-subtle form-group">
    <input type="text" name="id" value="<?= $data->id //$siswas['id']?>" hidden>
    <label for="">Nama User</label>
    <input value="<?= $data->nama_user //$siswas['nama']?>" class="form-control" type="text" id="nama_user" name="nama_user">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Username</label>
    <input value="<?= $data->username //$siswas['nama']?>" class="form-control" type="text" id="username" name="username">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Password</label>
    <input value="" class="form-control" type="text" id="password" name="password">
    <div class="form-text">kosongkan saja jika password tidak diisi.</div>
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Level</label>
    <input value="<?= $data->level //$siswas['nama']?>" class="form-control" type="text" id="level" name="level">
</div>
<div class="col bg-danger-subtle form-group">
    <label for="">Foto</label>
    <input value="<?= $data->foto //$siswas['nama']?>" class="form-control" type="text" id="foto" name="foto">
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