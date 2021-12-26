<?php

/*if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}*/


// initializing variables
$search = "";
$filter = "" ;

$search = $_POST['search'];
$filter = $_POST['filter'];

$_SESSION['arr_id'] = "";
$_SESSION['arr_fullname'] = "";
$_SESSION['arr_order_id'] = "";
$_SESSION['arr_cx_phone'] ="";
$_SESSION['arr_disposition'] = "";
$_SESSION['arr_amount'] = "";
$_SESSION['arr_date'] = "";

$filtered_query = "";
$arr_filtered_query = "";

$errors = array(); 

$db = mysqli_connect('localhost:7071', 'root', 'Altria123!@#', 'prog');

if (!$db) { die('Error: ' . mysql_error()); }



if (isset($_POST['search_button'])) {
  // receive all input values from the form
  $search = mysqli_real_escape_string($db, $_POST['search']);
  $filter = mysqli_real_escape_string($db, $_POST['filter']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($search)) { array_push($errors, "No id found"); }
  if (empty($filter)) { array_push($errors, "Fullname is required"); }
  


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

    
  	
    if($filter == "timestamp"){
      $filtered_query = "SELECT * FROM transactions WHERE $filter LIKE '$search%'";

              if ($stmt = mysqli_prepare($db, $filtered_query)) {

            /* execute statement */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $fullname, $order_id, $cx_phone, $disposition, $amount, $timestamp);

            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
              $_SESSION['arr_id'] = $id;
              $_SESSION['arr_fullname'] = $fullname;
              $_SESSION['arr_order_id'] = $order_id;
              $_SESSION['arr_cx_phone'] =$cx_phone;
              $_SESSION['arr_disposition'] = $disposition;
              $_SESSION['arr_amount'] = $amount;
              $_SESSION['arr_date'] = $timestamp;
              header('location: ../super/search.php');
            }

            /* close statement */
            /*mysqli_stmt_close($stmt);*/
        }

        /* close connection */
        /*mysqli_close($db);*/




        if ($db->query($filtered_query) == TRUE) {

          //header('location: ../super/edit.php');

      } else {

        echo $search;
        echo $filter;
        echo "<script>alert('No results found. Check your keywords or try a different search')</script>";

        header('location: ../super/edit.php');
      }

    }
    else
    {
      echo "Debugger: Error with filter values";
    }

  }

  else {
    echo "some errors found, please debug";
  }


?>