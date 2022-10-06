<?php
  session_start();
  include ('db_login.php');


  if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email == '') {
    $error_email = "Email is required";
    $valid = FALSE;
  }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error_email = "Invalid email format";
    $valid = FALSE;
  }
  //cek validasi password
  $password = ($_POST['password']);
  if ($password == ''){
      $error_password = "Password is required";
      $valid = FALSE;
  }

  if (!$email == '' && !$password == '') {
  $query = mysqli_query($conn,"select * from tb_user where email='$email' and password='$password'");
  $cek = mysqli_num_rows($query);

  if($cek > 0){
 
    $data = mysqli_fetch_assoc($query);
   
    // cek jika user login sebagai admin
    if($data['status']=="mhs"){
      // buat session login dan username
      $_SESSION['email'] = $email;
      $_SESSION['status'] = "mhs";
      $_SESSION['nim'] = $data['nim/nip'];
      header("location:./mahasiswa/index.php");

   
    // cek jika user login sebagai dosen
    }else if($data['status']=="dosen"){
      // buat session login dan email
      $_SESSION['email'] = $email;
      $_SESSION['status'] = "dosen";
      $_SESSION['nip'] = $data['nim/nip'];
      header("location: doswal/doswal.php");
   
    // cek jika user login sebagai pengurus
    }else if($data['status']=="operator"){
      // buat session login dan email
      $_SESSION['email'] = $email;
      $_SESSION['status'] = "operator";
      header("location:./operator/operator.php");
   
    }else if($data['status']=="departemen"){
      // buat session login dan email
      $_SESSION['email'] = $email;
      $_SESSION['status'] = "departemen";
      header("location:./departemen/index.php");
   
    }else{
   
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  }else{
    header("location:index.php?pesan=gagal");
  }
}

}





?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .gradient-custom{
            background: rgb(131,58,180);
            background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
            }
    </style>
</head>
  <body>
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login SIAP UNDIP</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-outline form-white mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?php if(isset($email)) echo $email;?>"/>
                    <label class="form-label" for="email">Email</label>
                    <div class="text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" id="password" value="" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                    <div class="text-danger"><?php if(isset($error_password)) echo $error_password;?></div>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="login" name="login" value="login">Login</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
