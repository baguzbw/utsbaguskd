<?php
include 'koneksi.php';
include 'function.php';
$username = $_POST["username"];
$password = $_POST["password"];
//enkripsi
$password_salt = $password . $username;
$password_enc = encryptPassword($password_salt);

$sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password_enc'";
$data = mysqli_query($conn, $sql);

if($data->num_rows > 0)
{
    $result = mysqli_fetch_assoc($data);
    session_start();
    $_SESSION["id"] = $result['id'];
    echo("<script>
    alert('Login Berhasil');
    document.location.href = 'dashboard.php';
    </script>");
}else{
    echo("<script>
    alert('Login Tidak Berhasil');
    document.location.href = 'index.php';
    </script>");
}
$conn->close();
?>