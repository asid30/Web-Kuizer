<?php
session_start();
include "koneksi.php";

$username = $_POST['user'];
$password = md5($_POST['pass']);

$query = mysqli_query($conn, "SELECT * FROM login where `username`='$username' and `password`='$password'");
$cek = mysqli_num_rows($query);
$result = mysqli_fetch_assoc($query);

$id_role = $result['id_role'];
$id_profile = $result['id_profile'];

if ($cek > 0) {
    if($id_profile == NULL){
        $id_profile = 1;
    }
    $_SESSION['username'] = $username;
    $_SESSION['id_role'] = $id_role;
    $_SESSION['id_profile'] = $id_profile;
    $_SESSION['status'] = "login";
    header("location:kuis1.php");
} else {
    header("location:index.php");
}
?>