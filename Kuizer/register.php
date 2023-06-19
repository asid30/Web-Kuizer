<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Kuizer</title>
</head>
<body>
    <!-- Navbar -->
    <?php include "navbar.php";?>

    <!-- Konten -->
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 21rem;">
            <div class="card-body">
                <form action="" method="post">
                    <h1 id="slmt">Selamat Datang</h1>
                    <label>Username : </label><br>
                    <input type="text" name="user"><br><br>
                    <label>Password : </label><br>
                    <input type="password" name="pass"><br><br>
                    <label>Role : </label><br>
                    <input type="radio" name="role" value="1"> Dosen
                    <input type="radio" name="role" value="2"> Mahasiswa<br><br>

                    <input type="submit" value="Register" class="btn btn-success" name="register"><br>
                    Sudah punya akun? Silahkan login <a href="index.php">disini</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
    include "koneksi.php";
    if (isset($_POST['register'])) {
        $username = $_POST['user'];
        $password = md5($_POST['pass']);
        $role = $_POST['role'];
        
        //mencari apakah ada username yang sama
        $sql2 = mysqli_query($conn, "SELECT * FROM login where `username`='$username'");
        $cek = mysqli_num_rows($sql2);
        if ($cek > 0) {
            echo "<script>alert('Username sudah digunakan!')</script>";
        } else {
            mysqli_query($conn, "INSERT INTO `login`(`id`, `username`, `password`, `id_role`, `id_profile`) VALUES (NULL,'$username','$password', $role, NULL)") or die(mysqli_error($conn));
            header('Location: register_tambah.php');
        }
    }

ob_end_flush();
?>