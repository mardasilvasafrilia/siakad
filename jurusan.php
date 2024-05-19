<?php
include('koneksi.php');
if ($_SESSION['login']=='sukses')
{
?>
<h3>Data Jurusan</h3>
<table class="table table-sm table-striped">
    <tr>
        <th>No.</th>
        <th>Jurusan</th>
        <th>Created by</th>
        <th>--Action--</th>
    </tr>
    <?php
    $query_select = $conn->query("SELECT  jurusan.id as j_id, 
                                            jurusan.nama_jurusan as n_j,
                                            nama_user as u_nu
                                            FROM jurusan
                                            JOIN user
                                            On jurusan.created_by = user.id");
    $no = 1;
    while ($data = $query_select->fetch_object()) {
    ?>
    <tr>
        <th><?= $no ?></th>
        <th><?= $data->n_j?></th>
        <th><?= $data->u_nu?></th>
        <th>
            <a style="text-decoration: none;" href="?menu=jurusan-edit&id=<?=$data->j_id?>">
            <button class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
            </button>
            </a>
            <a style="text-decoration: none;" href="?menu=jurusan-delete&id=<?=$data->j_id?>">
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
<a href="?menu=jurusan-tambah">
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