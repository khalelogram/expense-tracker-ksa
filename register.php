<?php
require_once('admin/private/init.php'); 

if(isset($_POST['submit'])) {
    $fullname=$_POST['fullname'];
    
    $username=$_POST['username'];
   
    $mobilenumber=$_POST['mobilenumber'];
    
    $email=$_POST['email'];
    
    $password=md5($_POST['password']);
    
    // $cpassword=md5($_POST['cpass']);
    $ret=mysqli_query($db, "SELECT email FROM users WHERE email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
      echo '<script language="javascript">';
      echo 'alert("Email address already in use.")';
      echo '</script>';
    }

    $ret=mysqli_query($db, "SELECT username FROM users WHERE username='$username'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
      echo '<script language="javascript">';
      echo 'alert("Username already in use.")';
      echo '</script>';
    } else{
    $query=mysqli_query($db, "INSERT INTO users (email, fullname, hashed_password, mobile_number, username) VALUES('$email', '$fullname', '$password', '$mobilenumber', '$username')");
    if ($query) {
      $query = "SELECT id FROM users ";
      $query .= "WHERE email = '$email'";
      $result = mysqli_query($db, $query);
      $get_user_id = mysqli_fetch_assoc($result);
      $_SESSION['user_id']= $get_user_id['id'];
      echo '<script language="javascript">';
      echo 'alert("You are now successfully registered!")';
      echo '</script>';
      header("Location: index.php");
  } else {
      echo '<script language="javascript">';
      echo 'alert("Something went wrong.")';
      echo '</script>';
   }
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

  <title>Expense Tracker - Register</title>

  <!-- Custom fonts for this template-->
  <link href="admin/fonts/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="fonts/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="admin/css/style.min.css" rel="stylesheet">
  



</head>

<body class="bg-gradient-primary" style="overflow:hidden">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="fullname" placeholder="Full Name" name="fullname" required="required">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" required="required">
                  </div>
                  <div class="col-sm-6">
                <input type="tel" class="form-control form-control-user" id="mobile" placeholder="11-digit Mobile Number" name="mobilenumber" pattern="[0-9]{11}" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" required="required">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required="required">
                  </div>
                 <!--  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Repeat Password" name="cpass">
                  </div> -->
                </div>
                 <button type="submit" value="Register Account" name="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                <a href="index.php"></a>
              </form>


              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
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
