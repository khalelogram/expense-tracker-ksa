<?php
require_once('admin/private/init.php');



if($_SERVER["REQUEST_METHOD"] == "POST")
  {
   // username and password sent from form 
     $username=mysqli_real_escape_string($db,$_POST['username']); 
     $password=mysqli_real_escape_string($db,$_POST['password']); 
 
     $sql="SELECT id FROM users WHERE username='$username' and password='$password'";
     $result=mysqli_query($db,$sql);
     if (!$sql) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
        }
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $active=$row['active'];
     $count=mysqli_num_rows($result); 
 
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1)
    {
     session_register("username");
     $_SESSION['login_user']=$username;
 
     header("location:admin/user_profile.php");
    }
    else 
    {
    $error="Your Login Name or Password is invalid";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Tracker - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/fonts/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="fonts/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="admin/css/style.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(https://images.pexels.com/photos/210705/pexels-photo-210705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                   
 
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter Username"  autocomplete="off" name="username" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"  autocomplete="off" name="password" required="required">
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="login">
                    <a href="admin/user_profile.php">
                    </a> 
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>