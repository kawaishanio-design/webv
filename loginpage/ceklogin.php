<?php

session_start();

include 'koneksi.php';

$username = $_POST['username'];
$userpass = $_POST['password'];

$login = mysqli_query($koneksi,"SELECT username, password, level FROM user WHERE username='$username'");
list($username, $password, $level) = mysqli_fetch_array($login);

$cek = mysqli_num_rows($login);

if($cek > 0){

    if (password_verify($userpass, $password)) {
    if($level=="admin"){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['level']=$level;
        header("location:../admin/index.php");
    }else if($level=="operartor"){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['level']=$level;
        header("location:../admin/index.php");
    }else if($level=="siswa"){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['level']=$level; 
        header("location:../index.php");
    }else if($level==""){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['level']=$level; 
        header("location:../index.php");
    }else{
        header("location:index.php?alert=gagal");}
            die();
        }else{echo'<script language="javascript">
            window.alert("LOGIN GAGAL! Silahkan coba lagi");
            window.location.href="index.php";
            </script>';}
        }   else { echo '<script language="javascript">
            window.alert("LOGIN GAGAL! Silahkan coba lagi");
            window.location.href="index.php";
            </script>';
    }       
?>