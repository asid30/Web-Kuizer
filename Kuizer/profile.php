<?php 
include "koneksi.php";
session_start();

if($_SESSION['status']!="login"){
    header("location:index.php");
}

$id_role = $_SESSION['id_role'];
$id_profile = $_SESSION['id_profile'];
$status = $_SESSION['status'];

$sql = mysqli_query($conn, "SELECT * FROM `profile`  WHERE `id_profile` = $id_profile");
$result = mysqli_fetch_assoc($sql);

//mencari role user
$sql2 = mysqli_query($conn, "SELECT * FROM `role` WHERE id = $id_role");
$result2 = mysqli_fetch_assoc($sql2);
if($result2['id']==1){
    $nama_role = "Dosen";
    $id_role = 1;
}else{
    $nama_role = "Mahasiswa";
    $id_role = 2;
}

$nama = $result['nama'];
$kelas = $result['kelas'];
$alamat = $result['alamat'];
$biografi = $result['biografi'];
$id_jenis_kelamin = $result['jenis_kelamin'];
if($id_jenis_kelamin == 1){
    $jenis_kelamin = "Laki-laki";
}else if($id_jenis_kelamin == 2){
    $jenis_kelamin = "Perempuan";
}else{
    $jenis_kelamin = "-";
}
$foto = $result['foto'];
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
                <div class="navbar">
                    <div class="nav-item">
                        <h4>Profile</h4>
                    </div>
                    <div class="nav-item">
                        <a href="profile_hapus.php" type="button" class="btn btn-danger">Hapus Akun</a>
                        <a href="profile_edit.php" type="button" class="btn btn-primary">Ubah Data</a>
                    </div>
                </div>
                <div class="card">
                    <div class="table-responsive bg-light" id="models">
                        <table class="table align-middle">
                            <tbody>
                                    <tr>
                                        <td>
                                            <img src="uploads/<?php echo $foto?>" alt="foto_profile" width="200" height="220" id="gambar">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?php echo $nama?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>: <?php echo $kelas?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?php echo $jenis_kelamin?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?php echo $alamat?></td>
                                    </tr>
                                    <tr>
                                        <td>Biografi</td>
                                        <td>: <?php echo $biografi?></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>: <?php echo $nama_role?></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>       
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    if (isset($_GET['hapus'])) {
        $sql = mysqli_query($conn, "DELETE FROM stok_bahan WHERE id_kategori = '$_GET[hapus]'") or die(mysqli_error($conn));
        mysqli_query($conn, "DELETE FROM kategori_bahan WHERE `kategori_bahan`.`id_kategori` = '$_GET[hapus]'") or die(mysqli_error($conn));
        echo "<script>alert('Data Telah Dihapus')</script>";
        echo "<meta http-equiv=refresh content=2;URL='stokBahan.php'>";
    }
?>