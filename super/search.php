
<?php
session_start();
 if (isset($_SESSION['loggedin'])) {
     
   }else {
      header('location: ../../index.php');

   }

   unset($_SESSION['filter_err']); //unset by default. this should only be setted when search button is clicked

   


//echo 'This variable holds a value of:  ' . gettype($_GET['search']);


if (isset($_GET['search_bt'])) {


	$search = $_GET['search'];
	$filter = $_GET['filter'];

	switch ($filter) {
        case 'noval':
		$_SESSION['filter_err'] = "Please select a filter";
		   	  echo("User has not selected any filter <br>");	
		   	  header('Location: ' . $_SERVER['HTTP_REFERER'] . $filter_err);
		   	  break;

		default:
		unset($_SESSION['filter_err']);
		break;
    }


	

}
else
{
	header('Location: edit.php');
}

$i = 0;


$_SESSION['arr_id'] = "";
$_SESSION['arr_fullname'] = "";
$_SESSION['arr_order_id'] = "";
$_SESSION['arr_cx_phone'] ="";
$_SESSION['arr_disposition'] = "";
$_SESSION['arr_amount'] = "";
$_SESSION['arr_date'] = "";

$filtered_query = "";
$arr_filtered_query = "";

 // Create connection
	$db = new mysqli('localhost', 'root', 'Altria123!@#', 'prog');
// Check connectionz
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
} 

	$sql = "SELECT * FROM transactions WHERE $filter LIKE '$search%'";

	
	$result = $db->query($sql);

/*$filtered_query = "SELECT * FROM transactions WHERE $filter LIKE '$search%'";

            if ($stmt = mysqli_prepare($db, $filtered_query)) {

            /* execute statement */
           /* mysqli_stmt_execute($stmt);

            /* bind result variables */
            /*mysqli_stmt_bind_result($stmt, $id, $fullname, $order_id, $cx_phone, $disposition, $amount, $timestamp);*/

            /* fetch values */
            /*while (mysqli_stmt_fetch($stmt)) {
              $_SESSION['arr_id'] = $id;
              $_SESSION['arr_fullname'] = $fullname;
              $_SESSION['arr_order_id'] = $order_id;
              $_SESSION['arr_cx_phone'] =$cx_phone;
              $_SESSION['arr_disposition'] = $disposition;
              $_SESSION['arr_amount'] = $amount;
              $_SESSION['arr_date'] = $timestamp;
              $i++;
              header('location: ../super/search.php');
            }*/
           /* echo $i;*/

            /* close statement */
            /*mysqli_stmt_close($stmt);
        }

        /*echo "prepared statement failed to execute";*/

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <style type="text/css">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       </style>
       
           <script type="text/javascript">
               <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       </script>
</head>
<style type="text/css">
	body{
		background-color: #white;
	}

	.dashboard-container{
		
		width: 100%;
		
		margin-bottom: 5%;
		padding: 3px;
		height: auto;
		background-color: white;
		border-radius: 8px; 

	}

	.dasboard-wrapper{
		margin: 1vw;
	}

	.header{
		margin-left: 45%;
		font-weight: 400%;		
	}

	h3{
		margin-top: 10px;
		margin-bottom: -20px;
	}

	.content{
		position: relative;
		background-color: white;
		margin: 2%;
		padding: 2%;
		max-height: 70%;
	}



	.tool-area{
		margin-left: 68%;
		display: inline-block;
		margin-bottom: 20px;
		
	}

	.save-changes{
		display: inline-block;
		margin-left: 58%;
		margin-bottom: 20px;
	}

	.hidden{
		border: hidden;
		background-color: transparent;

	}

	.modal{
		margin-top: 10%;
	}

	.select-style{
		height: 3vw;
		border-color: lightgrey;
	}

	.thead-pink{
		background-color: pink;
	}

	.btn-pink{
		background-color: #ffb6c1;
	}

	.bg-pink{
		background-color: #ffb6c1;
		color: black;
	}

	.navbar-sm{
		height:auto;
		box-shadow: 0px 1px 10px grey;

	}

	th{
		text-align: center;
	}

	td input{
		text-align: center;
	}

	button:hover {
	  background-color: #c7eeeb;
	}


	select {
		  -webkit-appearance: none;
		  -moz-appearance: none;
		  text-indent: 1px;
		  text-overflow: '';
		}

            /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

      ul {
      margin-left: 5%;
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  width: 100%;
	}

	li {
	  float: left;
	}

	li a {
	  
	  margin-left: 5%;
	  display: block;
	  color: black;
	  font-family: sans-serif;
	  font-size: 12px;
	  text-align: center;
	  margin-top: 0.5vw;
	  padding-left: 25px;
	  text-decoration: none;
	}

	li a:hover {
	  color: #c7eeeb;
	}


    .nav-icon{
    	margin-left: 2%;
    }

/*	table {
    width: 100%;
    display:block;
	}

	thead {
	    display: inline-block;
	    width: 100%;
	    height: 20px;
	}
	tbody {
	    height: 450px;
	    display: inline-block;
	    width: 100%;
	    overflow: auto;
	}*/

</style>
<body>
	<nav class="navbar navbar-dark bg-pink navbar-sm">

         <!-- <img src="../altria.png" class="nav-icon" width="95" height="55">&nbsp; -->
		<ul>
			<li><img src="../altria.png" width="100" height="55"></li>
			<li style="color: white;"><a href="edit.php">HOME</a></li>
			<li style="color: white;"><a href="signup.php">USERS</a></li>

		</ul>
	</nav>

	<div class="dashboard-container">
		<div class="dasboard-wrapper">
			
			<div class="header">
				<h3>Search Results</h3>
			</div>

			<div class="content">
				<form action="edit.php">
					<button type="submit" class="btn btn-sm btn-pink mb-3">Return to admin dashboard</button>
				</form>
				
				
				
				<table class="table table-striped">
					<thead class="thead-pink">
						<tr>
						<th scope="col"><label>Id</label></th>
						<th scope="col"><label>Agent Name</label></th>
						<th scope="col"><label>Order ID</label> </th>
						<th scope="col"><label>Customer Phone</label> </th>
						<th scope="col"> <label>Disposition</label> </th>
						<th scope="col"> <label>Amount</label> </th>
						<th scope="col"> <label>Time</label> </th>
						<th scope="col"> <label>Action</label> </th>
					</tr>
					
					</thead>
					<tbody>
							
						<?php

							if ($result->num_rows > 0) {
							  // output data of each row
							  while($row = $result->fetch_assoc()) {
							       echo "<tr>";
							       echo "<form action='../Controllers/update_db.php' method='POST'>";
							       echo "<tr>";
							       echo "<td scope='col'> <input type='text' size='1' name='id' class='hidden' value=".$row['id']." </td>";
							       echo "<td scope='col'> <input type='text' id='fullname' size='14' name='fullname' class='hidden' value=\"" . $row["fullname"] . "\" required> </td>";
							       echo "<td scope='col'> <input type='text' id='order_id' size='8' name='order_id' class='hidden' value=\"" . $row["order_id"] . "\" required> </td>";
							       echo "<td scope='col'> <input type='text id='cx_phone' size='10' name='cx_phone' class='hidden' value=".$row['cx_phone']." required></td>";
							       echo "<td scope='col'> <input type='text' id='disposition' size='15' name='disposition' class='hidden' value=\"" . $row["disposition"] . "\" required></td>";
							       echo "<td scope='col'> <input type='text' id='amount' size='8' name='amount' class='hidden' value=".$row['amount']." required></td>";
							       echo "<td scope='col'> <input type='text' id='timestamp' size='12' name='timestamp' class='hidden' value=".$row['timestamp']."  required></td>";
				                   echo "<td scope='col'> <button name='reg_user' class='btn btn-sm btn-pink'> save</button> </td>";
				                   echo "</form>";
				                   echo "</tr>";

								  }
							} 
							else {
								   echo "</tbody>";
								   echo "</table>";
								   echo "<div style='margin-left: 1%; color: red;'> 0 results </div>";
								   
							  
							}

							$db->close();

			            ?>

					</tbody>
					
						
				</table>
			</div>
		</div>
		
	</div>

</body>
</html>