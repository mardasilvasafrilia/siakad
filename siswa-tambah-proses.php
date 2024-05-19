
<?php
include('koneksi.php');
    $nis            =  $_POST['nis'];
    $nisn           =  $_POST['nisn'];
    $nama           =  $_POST['nama'];
    $jk             =  $_POST['jk'];
    $tempat_lahir   =  $_POST['tempat_lahir'];
    $tgl_lahir      =  $_POST['tanggal'];
    $alamat         =  $_POST['alamat'];
    $tlp            =  $_POST['tlp'];
    $email          =  $_POST['email'];
    $kelas          =  $_POST['kelas'];
    $jurusan        =  $_POST['jurusan'];
    $angkatan       =  $_POST['angkatan'];
    $created        =  $_POST['created'];

    $query_insert = $conn->query("INSERT INTO siswa 
                                         VALUES('', '$nis', '$nisn', '$nama', '$jk', '$tempat_lahir', '$tgl_lahir', '$alamat', '$tlp', '$email', '$kelas', '$jurusan', '$angkatan', '$created')");
    if ($query_insert) {
        ?>
        <script>
            alert('Data Berhasil Ditambah');
            window.location.href = 'index.php?menu=siswa';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Data Gagal Ditambah');
            window.location.href = 'index.php?menu=siswa';
        </script>
        <?php
    }

