<?php 
include "koneksi.php";
session_start();

if($_SESSION['status']!="login"){
    header("location:index.php");
}

$id_role = $_SESSION['id_role'];
$id_profile = $_SESSION['id_profile'];
$status = $_SESSION['status'];
$username = $_SESSION['username'];

if (isset($_POST['delete_data'])){
    $sql = "DELETE FROM login WHERE `login`.`username` = '$username'";
    $sql2 = "DELETE FROM profile WHERE `profile`.`id_profile` = $id_profile";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);

    header('Location: index.php');
}

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
    <?php include "navbar_login.php";?>
    
    <!-- Konten -->
    <div class="container">
        <div class="card bg-body-secondary">
            <div class="container">
                <br>
                <h4>Menu belum tersedia</h4><br>
                <p>Mohon maaf website masih dalam tahap pengembangan dan menu ini belum siap diluncurkan!</p>
                <a href="kuis1.php" class="btn btn-secondary">Kembali</a>
                <br><br>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>