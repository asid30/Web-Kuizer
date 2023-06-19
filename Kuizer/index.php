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
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <form action="login.php" method="post">
                    <h1 id="slmt">Selamat Datang</h1>
                    <label>Username : </label><br>
                    <input type="text" name="user"><br><br>
                    <label>Password : </label><br>
                    <input type="password" name="pass"><br><br>
                    <input type="submit" value="Login" class="btn btn-primary"><br>
                    Belum punya akun? Silahkan registrasi <a href="register.php">disini</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>