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

$nama1 = $result['nama'];
$kelas1 = $result['kelas'];
$alamat1 = $result['alamat'];
$biografi1 = $result['biografi'];
$id_jenis_kelamin1 = $result['jenis_kelamin'];
if($id_jenis_kelamin1 == 1){
    $jenis_kelamin1 = "Laki-laki";
}else if($id_jenis_kelamin1 == 2){
    $jenis_kelamin1 = "Perempuan";
}else{
    $jenis_kelamin1 = "-";
}
$foto1 = $result['foto'];

if (isset($_POST['update'])) {
    //mencari id_profile tertinggi untuk dijadikan patokan id_profile berikutnya
    $query3 = "SELECT * FROM `profile` WHERE id_profile = (SELECT MAX(id_profile) FROM `profile`);";
    $sql3 = mysqli_query($conn, $query3);
    while($result3 = mysqli_fetch_assoc($sql3)) {
        $id_profile_orang = $result['id_profile']+1;
    }

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $biografi = $_POST['biografi'];
    $id_jenis_kelamin = $_POST['jenis_kelamin'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File bukan gambar!')</script>";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "<script>alert('Format file yang diperbolehkan: JPG, JPEG, PNG & GIF')</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('File gagal diupload!')</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<script>alert('File berhasil diupload!')</script>";
        } else {
            echo "<script>alert('File gagal diupload!')</script>";
        }
    }

    $foto = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));

    if($id_profile == 1){
        //tambah profile baru
        mysqli_query($conn, "INSERT INTO `profile`(`id_profile`, `nama`, `kelas`, `alamat`, `biografi`, `jenis_kelamin`, `foto`) VALUES ($id_profile_orang,'$nama','$kelas','$alamat','$biografi','$id_jenis_kelamin','$foto')") or die(mysqli_error($conn));
        //update profile tabel login
        mysqli_query($conn, "UPDATE `login` SET `id_profile`='$id_profile_orang' WHERE `username` = '$username'") or die(mysqli_error($conn));
        $_SESSION['id_profile'] = $id_profile_orang;
    }
    else{
        mysqli_query($conn, "UPDATE `profile` SET `nama`='$nama',`kelas`='$kelas',`alamat`='$alamat',`biografi`='$biografi',`jenis_kelamin`='$id_jenis_kelamin',`foto`='$foto' WHERE `id_profile`='$id_profile'") or die(mysqli_error($conn));
    }
    echo "<script>alert('Perubahan Berhasil Disimpan');document.location='profile.php'</script>";
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
                <h4>Ubah Data Profile</h4><br>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama1?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="kelas" aria-label=".form-select-lg example" value="<?php echo $kelas1?>">
                        <option hidden selected>Pilih</option>
                        <option value="A">Kelas A</option>
                        <option value="B">Kelas B</option>
                        <option value="C">Kelas C</option>
                        <option value="D">Kelas D</option>
                    </select>
                    </div>
                    </div>

                    <div class="mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="jenis_kelamin" aria-label=".form-select-lg example" value="<?php echo $id_jenis_kelamin1?>">
                        <option hidden selected>Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="alamat" name="alamat"><?php echo $alamat1?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="biografi" class="col-sm-2 col-form-label">Biografi</label>
                        <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="biografi" name="biografi"><?php echo $biografi1?></textarea>
                        </div>
                    </div>

                    <div class="navbar">
                        <div class="nav-item"></div>
                        <div class="nav-item">
                            <img src="uploads/<?php echo $foto1?>" alt="foto_profile" width="200" height="220" border="1px"><br>
                            Preview gambar
                        </div>
                        <div class="nav-item"></div>
                    </div>
                    

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $foto11?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                    <a href="profile.php" class="btn btn-danger">Kembali</a>
                </form>
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>