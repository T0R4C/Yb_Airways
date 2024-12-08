<?php
require '../config.php';
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE email = '$email' AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<script type='text/javascript'>alert('Berhasil Login!')";
    header("Location: ../Home");
} else {
    echo "<script type='text/javascript'>alert('Email / Password salah. Silahkan Coba Login Kembali.'); 
    window.location.href = 'index.html'</script>";
}