<?php
include "koneksi.php";
if($_SESSION['status']!="login"){
    header("location:index.php");
}
?>

    <!-- Navbar -->
    <nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"><b>KUIZER</b></a>
        <div id="sketch-holder">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.js"></script>
            <script>
            function setup() {
                var canvas = createCanvas(200, 40);
                canvas.parent('sketch-holder');
            }
            function draw() {
                function addZero(i) {
                    if (i < 10) {
                        i = "0" + i
                    }
                    return i;
                }
                const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Augustus","September","Oktober","November","Desember"];

                const d = new Date();
                let year = d.getFullYear();
                let month = months[d.getMonth()];
                let date1 = d.getDate();
                let h = addZero(d.getHours());
                let m = addZero(d.getMinutes());
                let s = addZero(d.getSeconds());
                let time = h + " : " + m + " : " + s + " WIB";
                let hari = date1 + " " + month + " " + year;
                background('#212529');
                textSize(15);
                fill(255);
                text("Jam : ", 3, 36);
                text(hari, 65, 18);
                fill(240, 20, 20);
                text(time, 45, 36);
                textStyle(BOLD);
                textFont('Helvetica');
            }
            </script>
        </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <div>
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
                    <?php 
                    $id_profile = $_SESSION['id_profile'];
                    $id_role = $_SESSION['id_role'];
                    //mencari nama user
                    $sql = mysqli_query($conn, "SELECT * FROM `profile` WHERE id_profile = $id_profile");
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
                    //print nama dan role user
                    echo "Halo, ".$result['nama']." <br>"."Role : ".$nama_role;
                    ?>
                </div>
                <!-- <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="list-group">
                    <a href="kuis1.php" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
                    <?php if($id_role == 1){ ?>
                    <a href="menu_admin.php" class="list-group-item list-group-item-action">Menu Admin</a>
                    <?php }else{ ?>
                    <a class="list-group-item list-group-item-action disabled">Menu Admin</a>
                    <?php } ?>
                </div>
            </div>
            <div class="offcanvas-header">
                <div></div>
                <a href="logout.php" type="button" class="btn btn-dark">Log out</a>
            </div>
        </div>
    </div>
    </nav>