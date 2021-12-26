<?php
session_start();

// initializing variables
$fullname = "";
$password = "";
$password_1 = "";
$usertype = "";

$hashed_password = "";

$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'Altria123!@#', 'prog');

// REGISTER USER


if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
 

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($usertype)) { array_push($errors, "PLease select your usertype"); }
  
	/*array_push($errors, "The two passwords do not match");*/
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 /* $user_check_query = "SELECT * FROM user WHERE username='$fullname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fullname'] === $fullname) {
      array_push($errors, "User already exists");
    }
  }*/

  // Finally, register user if there are no errors in the form
  

  if (count($errors) == 0) {
  	
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


  	$query = "INSERT INTO agents (fullname, password, usertype) 
  			  VALUES( '$fullname', '$hashed_password', '$usertype')";

 
  

    if ($db->query($query) === TRUE) {
      echo "New record created successfully";
      /*mysqli_query($db, $query);*/
      $_SESSION['fullname'] = $fullname;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../super/edit.php');
    } else {
      echo "Error: " . $query . "<br>" . $db->error;
    }

  	
  }


?>