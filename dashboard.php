<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Anda belum login');
    window.location.href='index.php';
    </script>");
} else {
    include 'koneksi.php';
    include 'decrypt.php';
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `user` WHERE `id` = '$id' LIMIT 1";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    $username = $result['username'];
    $password_enc = $result['password'];
    $password_dec = decryptPassword($password_enc);
    $shown_pass = explode($username, strtolower($password_dec));
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halo Mahasiswa</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><b>Sentinel University</b></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Data Diri Mahasiswa</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">KRS</a>
                </div>
            </div>
            <!-- Page content wrapper   -->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn" id=sidebarToggle><i class="fa fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <a class="btn btn-secondary" href="logout.php" role="button">Logout</a>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Selamat Datang!</h2>
                    <table style="font-size:large;">
                        <tr>
                            <td><b>Nama</b></td>
                            <td>&nbsp;</td>
                            <td><?php echo $result['namalengkap']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Username</b></td>
                            <td>&nbsp;</td>
                            <td><?php echo $result['username']; ?></td>
                        </tr>
                    </table>
                    <br>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#showPasswordModal">Lihat password</button>
                    <div class="modal modal-sm fade" id="showPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showPasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="showPasswordModalLabel">Info Login</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table>
                                        <tr>
                                            <td><b>Username</b></td>
                                            <td>&nbsp;</td>
                                            <td><?php echo $result['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Password</b></td>
                                            <td>&nbsp;</td>
                                            <td><?php echo $shown_pass[0]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
