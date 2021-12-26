<?php
session_start();

// initializing variables
$fullname = $_SESSION['fullname'];
$order_id = "";
$cx_phone = "";
$disposition = "";
$amount = "";

$amount = $_POST['amount'];

$hashed_password = "";

$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'Altria123!@#', 'prog');

// REGISTER USER


if (isset($_POST['reg_user'])) {

}
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $order_id = mysqli_real_escape_string($db, $_POST['order_id']);
  $cx_phone = mysqli_real_escape_string($db, $_POST['cx_phone']);
  $disposition = mysqli_real_escape_string($db, $_POST['disposition']);

 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($order_id)) { array_push($errors, "Order id is required"); }
 /* if (empty($cx_phone)) { array_push($errors, "Password is required"); }*/
  if (empty($disposition)) { array_push($errors, "Disposition is required"); }
  /*if (empty($amount)) { $amount = 0;  } else{ $amount = mysqli_real_escape_string($db, $_POST['amount']);}}*/


  if (count($errors) == 0) {
  	
   


  	$query = "INSERT INTO transactions (fullname, order_id, cx_phone, disposition, amount) 
  			  VALUES( '$fullname', '$order_id', '$cx_phone', '$disposition', '$amount')";

    if ($db->query($query) === TRUE) {
      echo "New record created successfully";
     
      echo $query;

      
      $_SESSION['record_success'] = "New record added";
      $db->close();
      header('location: ../agent.php?success=successfully added a record');
    } else {
      echo "Error: " . $query . "<br>" . $db->error;
    }

  }
  
  else {
    echo "some errors found, please debug";
    $db->close();
  }


?>