<?php 



// similar with if(isset($_POST['submit])) when checking a form
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}


function createUser(){		
	global $db;
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$mobile_number = $_POST['mobile_number'];
	$hashed_password = $_POST['hashed_password'];
	$reg_date = $_POST['reg_date'];



// data validation

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['hashed_password'] == $_POST['cpass']) {

        $fullname = $_POST['first'];
        $username = $_POST['last'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobile_number'];
        $hashed_password = md5($_POST['hashed_password']);
        $reg_date = $_POST['reg_date'];

      

            $_SESSION['email'] = $email;

               $sql = "INSERT INTO tbluser (fullname, username, email, mobile_number, hashed_password, reg_date) VALUES ('$fullname, $username, $email, $mobile_number, $hashed_password, NOW())";

                    $_SESSION['message'] = "Registration Successful";

                }
                else {
                    $_SESSION['message'] = "Error: User account could not be 
											created. Please try again.";
                }
                mysqli_close($mysqli);          
            }
    else {
        $_SESSION['message'] = "Passwords do not match";
    }


// space trimming
	if(trim($fullname) == "" || trim($username) == "" || trim($email) == "" || trim($mobile_number) == "" || trim($hashed_password) == "")  return "Double check your data";

	// $phoneNumber = $_POST['mobileno'];

	if(!empty($mobile_number)) // phone number is not empty
	{
	    if(preg_match('/^\d{10}$/',$mobile_number)) // phone number is valid
	    {
	      $mobile_number = '0' . $mobile_number;

	      // your other code here
	    }
	    else // phone number is not valid
	    {
	      echo 'Mobile number invalid !';
	    }
	}
	else // phone number is empty
	{
	  echo 'You must provide a mobile number !';
	}



	$query = "INSERT INTO tbluser (fullname, username, email, mobile_number hashed_password, reg_date) VALUES ('$fullname, $username, $email, $mobile_number, $hashed_password, NOW())";

	$result = mysqli_query($db, $query);

	if (!$result) {
		return "Failed to register!";
	}else{
		return "Successfully registered!";
	}

}

