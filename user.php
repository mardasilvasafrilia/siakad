<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h3>Data User</h3>
<table class="table table-sm table-striped">
    <tr>
        <th>No.</th>
        <th>Nama User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Foto</th>
        <th>--Action--</th>
    </tr>
    <?php
    $query_select = $conn->query("SELECT * FROM user");
    $no = 1;
    while ($data = $query_select->fetch_object()) {
    ?>
    <tr>
        <th><?= $no ?></th>
        <th><?= $data-> nama_user?></th>
        <th><?= $data-> username?></th>
        <th>********</th>
        <th><?= $data-> level?></th>
        <th>
            <img width="60" src="asset/foto/<?= $data->foto?>" alt="fotonya lagi error">
        </th>
        <th>
            <a style="text-decoration: none;" href="?menu=user-edit&id=<?=$data->id?>">
            <button class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
            </button>
            </a>
            <a style="text-decoration: none;" href="?menu=user-delete&id=<?=$data->id?>">
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
    </tr>
</table>
<a href="?menu=user-tambah">
    <button class="btn btn-success mb-2"><i class="fa-solid fa-user-plus"></i> Tambah</button>
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