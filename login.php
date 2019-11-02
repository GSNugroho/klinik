<?php

session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

// query untuk mendapatkan record dari username
//$query = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
//$hasil = mysql_query($query);
//
//if (!$hasil) {
//    echo '<h1>Login gagal</h1>';
//    header('location: index.php?Message=' . urlencode("Gagal Login"));
//} else {
//    while ($data = mysql_fetch_array($hasil)) {
//        $_SESSION['level'] = $data['level'];
//        $_SESSION['id_user'] = $data['id_user'];
//        $_SESSION['username'] = $data['username'];
//        $_SESSION['cabang'] = $data['cabang'];
//        header('location: home.php');
//    }
//}


//login new
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status = 'aktif'");

if (mysqli_num_rows($query) != 1) {
    echo '<h1>Login gagal</h1>';
    header('location: index.php?Message=' . urlencode("Gagal Login"));
} else {
    while ($hasil = mysqli_fetch_array($query)) {
        $user = $hasil['username'];
        $pass = $hasil['password'];
        $status = $hasil['status'];
        if ($user == $username && $pass == $password ) {
            $_SESSION['level'] = $hasil['level'];
            $_SESSION['id_user'] = $hasil['id_user'];
            $_SESSION['username'] = $hasil['username'];
            $_SESSION['cabang'] = $hasil['cabang'];
            header('location: home.php');
        }
    }
}


if (isset($_GET['aksi']) == 'logout') {
    $_SESSION = array();
    session_destroy();
    header('location:index.php');
}
?>