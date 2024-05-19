<?php
// $pw = password_verify();
include('koneksi.php');
session_start();
if ($_POST) {
    $username        = $_POST['username'];
    $password        = $_POST['password'];
    $query_select = $conn->query("SELECT * FROM user WHERE username = '$username'");
    $hitung_data = $query_select->num_rows;
    $result = $query_select->fetch_assoc();

    if ($hitung_data > 0) 
    {
        
        if (password_verify($password,$result['password']))
        {
            
            $_SESSION['login']      = 'sukses';
            $_SESSION['level']      = $result['level'];
            $_SESSION['nama_user']  = $result['nama_user'];
            $_SESSION['id_user']    = $result['id'];
            $_SESSION['foto']       = $result['foto'];
            ?>
            <script>
                alert('Anda Berhasil Login !!!');
                window.location.href='index.php?menu=home';
            </script>
            <?php
        }
    }
    else
    {
        // var_dump($result['username']);
        ?>
        <script>
            Window.alert('Akun Anda Salah');
            window.location.href='login.php';
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="asset/bootstrap-5.3.1-dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <table style="margin-top: 100px;" width="100%">
                    <form action="" method="POST">
                    <tr>
                        <td align="center"><img width="300" height="200" src="asset/foto/siakad.png" alt=""></td>
                    </tr>
                    <tr>
                        <td align="center"><h2>LOGIN SISTEM AKADEMIK</h2></td>
                    </tr>
                    <tr>
                        <td><input placeholder="username" class="text-center form-control mb-2" type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td><input placeholder="password" class="text-center form-control mb-2" type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td class="d-grid"><button class="btn btn-primary" type="submit" name="submit">LOGIN</button></td>
                    </tr>
                    </form>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>