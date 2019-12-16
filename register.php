<?php
require_once('admin/private/init.php'); 
include('admin/inc/header.php');

if(isset($_POST['submit']))
  {
    $fname=$_POST['fullname'];
    $username=$_POST['username'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    // $cpassword=md5($_POST['cpass']);


    $ret=mysqli_query($db, "SELECT email FROM users WHERE email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
    $msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($db, "INSERT INTO users (email, fullname, hashed_password, mobile_number, username) VALUES('$email', '$fname', '$password', '$mobno', '$username')");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}
 ?>

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
                  <input type="text" class="form-control form-control-user" id="fullname" placeholder="Full Name" name="fullname">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="Username">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" id="mobile" placeholder="Mobile Number" name="mobilenumber">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
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
