<?php
include('koneksi.php');
session_start();
if ($_SESSION['login']=='sukses')
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>
    <link rel="stylesheet" href="asset/bootstrap-5.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.css">
</head>
<body>
    <div class="container-fluid">
        <!-- start code isi header-->
    <div class="row">
        <div class="col bg-light-subtle text-center">
        <img width="1000" height="200" src="asset/foto/siakad.jpg" alt="">
      <p></p>
      </div>
    </div>
        <!-- end code isi header -->
         <!-- start code isi navigasi -->
    <div class="row">
        <div class="col bg-danger-subtle text-center">
    <nav class="navbar navbar-expand-lg bg-danger-subtle">
    <div class="container-fluid ">
    <a class="navbar-brand" href="#" >Mrdslv</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?menu=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=user">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=siswa">Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=kelas">Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=jurusan">Jurusan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=angkatan">Angkatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=guru">Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="?menu=contact">Contact</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    </div>
    </nav>
    </div>
    </div>
          <!-- end code isi navigasi -->
    <div class="row mb-1">
        <!-- start code isi side bar -->
        <div class="col-3 bg-success-subtle">
        <h4 align="center">Administrasi
        <?php
        echo $_SESSION['nama_user'];
        ?>
        </h4>
        <center><img width="300" height="300" src="asset/foto/<?php echo $_SESSION['foto'];?>" alt="gambar tidak ada"></center>
        <p></p>
        <center>
          <a style="text-decoration: none;" href="?menu=logout">
            <button class="btn btn-success mb-2"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
          </a>
        </center>
        <!-- end code isi side bar -->
        </div>
        <div class="col-9 bg-warning-subtle text-center">
            <!-- start code isi konten -->
        <?php
        include('koneksi.php');
            if ($_GET) {
                $menu = $_GET['menu'];
                switch ($menu) {
                    case 'home':
                        include("home.php");
                        break;
                    case 'about':
                        include("about.php");
                        break;
                    case 'user':
                        include("user.php");
                        break;
                    case 'user-tambah':
                        include("user-tambah.php");
                        break;
                    case 'user-delete':
                        include("user-delete.php");
                        break;
                    case 'user-edit':
                        include("user-edit.php");
                        break;
                    case 'siswa':
                        include("siswa.php");
                        break;
                    case 'kelas':
                        include("kelas.php");
                        break;
                    case 'kelas-edit':
                        include("kelas-edit.php");
                        break;
                    case 'kelas-tambah':
                        include("kelas-tambah.php");
                        break;
                    case 'kelas-delete':
                        include("kelas-delete.php");
                        break;
                    case 'jurusan':
                        include("jurusan.php");
                        break;
                    case 'jurusan-edit':
                        include("jurusan-edit.php");
                        break;
                    case 'jurusan-tambah':
                        include("jurusan-tambah.php");
                        break;
                    case 'jurusan-delete':
                        include("jurusan-delete.php");
                        break;
                    case 'angkatan':
                      include("angkatan.php");
                      break;
                    case 'angkatan-edit':
                      include("angkatan-edit.php");
                        break;
                    case 'angkatan-tambah':
                        include("angkatan-tambah.php");
                        break;
                    case 'angkatan-delete':
                        include("angkatan-delete.php");
                        break;
                    case 'guru':
                        include("guru.php");
                        break;
                    case 'guru-tambah':
                        include("guru-tambah.php");
                        break;
                    case 'guru-delete':
                        include("guru-delete.php");
                        break;
                    case 'guru-edit':
                        include("guru-edit.php");
                        break;
                    case 'siswa-tambah':
                        include("siswa-tambah.php");
                        break;
                    case 'siswa-delete':
                        include("siswa-delete.php");
                        break;
                    case 'siswa-edit':
                        include("siswa-edit.php");
                        break;
                    case 'logout':
                        include("logout.php");
                        break;
                    case 'gallery':
                        include("gallery.php");
                        break;
                    case 'contact':
                        include("contact.php");
                        break;
                    default:
                        echo "Halaman yang anda minta tidak tersedia.";
                        break;
                }
            }        
        ?>  
          <!-- end code isi konten -->    
    </div>
    </div>
    <div class="row">
    <div class="col bg-danger-subtle text-center p-1">
         <!-- start code isi footer -->
        Copyright &copy; Mardasilva safrilia - 2023
         <!-- end code isi footer -->
    </div>
    </div>
    </div>
    <script src="asset/bootstrap-5.3.1-dist/js/bootstrap.js"></script>
    <script src="asset/bootstrap-5.3.1-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
<?php
}
else {
  ?>
  <script>
    alert('Anda tidak mempunyai hak akses, silahkan login !');
    window.location.href="login.php";
  </script>
  <?php
}
?>