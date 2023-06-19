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
    <br>
    <div class="container">
        <div class="card" style="width: 70rem;">
            <div class="card-body">
                <h1 id="slmt">Selamat mengerjakan!</h1><br>
                <form action="hasil.php" method="POST">
                <?php
                //menampilkan kuis
                try {
                    $pdo = include "koneksi.php";
                    $query = $pdo->prepare("select * from pertanyaan order by rand() limit 50");
                    $query->execute();
                    echo '<ol>';
                    while ($pertanyaan = $query->fetch()) {
                        echo '<li>';
                        echo htmlentities($pertanyaan['deskripsi']);
                        $query2 = $pdo->prepare("select * from jawaban where id_pertanyaan = :id_pertanyaan order by rand()");
                        $query2->execute(array("id_pertanyaan" => $pertanyaan['id']));
                        echo '<ol type="A">';
                        while($jawaban = $query2->fetch()) {
                            echo '<li>';
                            echo '<input type="radio" name="jawaban['.$pertanyaan['id'].']" value="'.$jawaban['id'].'"/> ';
                            echo htmlentities($jawaban['deskripsi']);
                            echo '</li>';
                        }
                        echo '</ol>';
                        echo '</li><br>';
                    }
                    echo '</ol>';
                } catch (Exception $e) {
                    echo "Gagal menampilkan pertanyaan. ";
                    echo "Error: ".$e->getMessage();
                }
                ?>
                <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>