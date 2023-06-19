<?php 
session_start();

if($_SESSION['status']!="login"){
    header("location:index.php");
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
                <div class="row">
                    <div class="col mb-3 mb-sm-7">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kuis dan Ujian yang tersedia</h4>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kuis 1 Ilmu Komputer</h5>
                                <p class="card-text">Materi sejarah dan komponen dasar komputer</p>
                                <p class="card-text">
                                    <table>
                                        <tr>
                                            <td>Jumlah soal</td>
                                            <td> : 10 Soal (Pilihan Ganda)</td>
                                        </tr>
                                        <tr>
                                            <td>Durasi</td>
                                            <td> : -</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td> : Tersedia</td>
                                        </tr>
                                    </table>
                                </p>
                                <a href="kuis2.php" class="btn btn-primary">Mulai</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kuis 1 Matematika Diskrit</h5>
                                <p class="card-text">Materi perhitungan galat dan integral</p>
                                <p class="card-text">
                                    <table>
                                        <tr>
                                            <td>Jumlah soal</td>
                                            <td> : 10 Soal (Pilihan Ganda)</td>
                                        </tr>
                                        <tr>
                                            <td>Durasi</td>
                                            <td> : 20 menit</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td id="merah"> : Tidak tersedia</td>
                                        </tr>
                                    </table>
                                </p>
                                <button type="button" class="btn btn-secondary" disabled>Mulai</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>