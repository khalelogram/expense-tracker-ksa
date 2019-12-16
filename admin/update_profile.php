<?php

	require_once('private/init.php');
	global $db;
	$email = $_POST['email'];
	$mobile_number = $_POST['mobile_number'];
	$fullname = $_POST['fullname'];
	$user_bio = $_POST['user_bio'];
	// $user_photo = $_POST['user_photo'];
	$userid = $_POST['userid'];

	$currentDir = getcwd();
    $uploadDirectory = "/img/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }

	// die();
	
	$sql = "UPDATE users SET email='".$email."', mobile_number='".$mobile_number."', user_bio='".$user_bio."', fullname='".$fullname."', user_image='".$_FILES['myfile']['name']."' WHERE id='".$userid."';";

	if (mysqli_query($db, $sql)) {
		echo "<script>alert('Profile Successfully Updated!');document.location.href='../admin/user_profile.php';</script>";
	}else{
		echo "Error updating record: " . mysqli_error($db);
	}
	mysqli_close($db);
?>