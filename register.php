<?php
require 'function.php';
if (isset($_POST["register"])) {
  if(registrasi($_POST) > 0){
    echo "<script>
    alert('User berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Login</title> 
  </head>
  <body>
    <form method="POST" action="">
      <section class="vh-100" style="background-color: #20c997">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem">
                <div class="card-body p-5 text-center">
                  <h3 class="mb-5"><b>SIAKAD </b>MAHASISWA</h3>
                  <div class="form-outline mb-4">
                    <input type="text" id="namalengkap" class="form-control form-control-lg" placeholder="Masukkan Nama Lengkap" name="namalengkap" />
                    <label class="form-label" for="namalengkap"></label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="username" class="form-control form-control-lg" placeholder="Masukkan Username" name="username" />
                    <label class="form-label" for="username"></label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Masukkan Password" name="password" />
                    <label class="form-label" for="typePasswordX-2"></label>
                  </div>
                  <button class="btn btn-secondary btn-lg btn-block " type="submit" name="register" >Register</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
