<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$telpon = $_POST['no_telp'];
$level = $_POST['level'];
    $sql = "SELECT * FROM user WHERE username= '$username'";
    $result = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($result) == 0)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi,"insert into user (username, password, email, no_telp, level)
        values ('$username','$password','$email','$telpon','$level')");
        header('Location: index.php');
    } else { echo '<script language= "javascript">
             window.alert("Username sudah digunakan, Silahkan gunakan nama lain");
             window.location.href="daftar.php";
             </script>';
    }
?>