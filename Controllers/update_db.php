<?php

/*if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}*/


// initializing variables
$id = "";
$fullname = "" ;
$cx_phone = "";
$disposition = "";
$amount = "";

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$order_id = $_POST['order_id'];
$cx_phone = $_POST['cx_phone'];
$disposition = $_POST['disposition'];
$amount = $_POST['amount'];



$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'Altria123!@#', 'prog');

if (!$db) { die('Error: ' . mysql_error()); }



if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $order_id = mysqli_real_escape_string($db, $_POST['order_id']);
  $cx_phone = mysqli_real_escape_string($db, $_POST['cx_phone']);
  $disposition = mysqli_real_escape_string($db, $_POST['disposition']);

 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
/*  if (empty($id)) { array_push($errors, "No id found"); }
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($cx_phone)) { array_push($errors, "Password is required"); }
  if (empty($disposition)) { array_push($errors, "Disposition is required"); }*/
  
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
  	
   


  	$query = "UPDATE transactions
              SET id = '$id', fullname = '$fullname', order_id = '$order_id', cx_phone = '$cx_phone', disposition = '$disposition', amount = '$amount'
              WHERE id = $id";

    echo $query;

    if ($db->query($query) === TRUE) {
        header('location: ../super/edit.php');
     
      
      $_SESSION['record_success'] = "New record added";
      header('location: ../super/edit.php');
    } else {
      echo "Error: " . $query . "<br>" . $db->error;
    }

  }
  else {
    echo "some errors found, please debug";
  }






?>