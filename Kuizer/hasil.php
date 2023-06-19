<?php 
include "koneksi.php";
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
    <?php include "navbar_login.php"; ?>

    <!-- Konten -->
    <div class="container">
        <div class="card" style="width: 70rem;">
            <div class="card-body">
            <h1>Hasil Kuis</h1>
            <?php
            $pdo = include "koneksi.php";
            if (empty($_POST['jawaban']) === false) {
                $html = '<ol>';
                $totalSkor = 0;
                foreach ($_POST['jawaban'] as $idPertanyaan => $idJawaban) {
                    // Query pertanyaan
                    $query = $pdo->prepare("select * from pertanyaan where id = :id");
                    $query->execute(array("id" => $idPertanyaan));
                    $pertanyaan = $query->fetch();
                    $html .= '<li>';
                    $html .= htmlentities($pertanyaan['deskripsi']);
                    // Query jawaban
                    $query2 = $pdo->prepare("select * from jawaban where id = :id and id_pertanyaan = :id_pertanyaan");
                    $query2->execute(array(
                        'id' => $idJawaban,
                        'id_pertanyaan' => $idPertanyaan
                    ));
                    $jawaban = $query2->fetch();
                    if (!$jawaban) {
                        $html .= '<p style="color:red">Salah</p>';
                    } else {
                        $html .= '<p>Jawaban: '. $jawaban['deskripsi'].'</p>';
                        if ($jawaban['benar'] == 1) {
                            $html .= '<p style="color:green">Benar</p>'; 
                            $totalSkor += $pertanyaan['skor']*10;
                        } else {
                            $html .= '<p style="color:red">Salah</p>'; 
                        }
                    }
                    $html .= '</li>';
                }
                $html .= '</ol>';
            
                // Tampilkan Skor
                echo '<h1>Score: '.$totalSkor.'%</h1>';
            
                // Tampilan Detail Jawaban
                echo '<h2>Detail Hasil Anda</h2><br>';
                echo $html;
            }
            ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>