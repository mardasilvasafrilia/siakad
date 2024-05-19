<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h3>Data Angkatan</h3>
<table class="table table-sm table-striped">
    <tr>
        <th>No.</th>
        <th>Angkatan</th>
        <th>Created by</th>
        <th>--Action--</th>
    </tr>
    <?php
    $query_select = $conn->query("SELECT  angkatan.id as a_id, 
                                                angkatan.tahun_angkatan as a_ta,
                                                nama_user as u_nu
                                                FROM angkatan
                                                JOIN user
                                                On angkatan.created_by = user.id");
    $no = 1;
    while ($data = $query_select->fetch_object()) {
    ?>
    <tr>
        <th><?= $no ?></th>
        <th><?= $data->a_ta?></th>
        <th><?= $data->u_nu?></th>
        <th>
            <a style="text-decoration: none;" href="?menu=angkatan-edit&id=<?=$data->a_id?>">
            <button class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
            </button>
            </a>
            <a style="text-decoration: none;" href="?menu=angkatan-delete&id=<?=$data->a_id?>">
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
    </tr>
</table>
<a href="?menu=angkatan-tambah">
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