<?php 
session_start();
include "admin/koneksi.php";
if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
    $hsl= mysqli_query($koneksi, $sql);

    if($hsl -> num_rows > 0 ){
        while($data = mysqli_fetch_assoc($hsl)){
            $_SESSION['username'] = $user;
            $_SESSION['level'] = $data['level'];

            if($data['level'] == 'admin'){
                header("location:admin/dashboard.php");
            }else if($data['level'] == 'user'){
                header("location:user/dashboard.php");
            }
        }
    }else{
        echo "SALAH WOI SALAH";
    }
}
?>