
<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}

 // Create connection
	$conn = new mysqli('localhost', 'root', 'Altria123!@#', 'prog');
// Check connectionz
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$name = $_SESSION['name'];


$sql = "SELECT * FROM transactions WHERE fullname = '$name' ORDER BY timestamp DESC";


$result = $conn->query($sql);

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
		background-color: white;
	}

	.dashboard-container{
		
		width: 100%;
		margin-bottom: 5%;
		padding: 3px;
		height: auto;
		background-color: white;
		border-radius: 8px; 

	}

		.tool-area{
		margin-left: 68%;
		display: inline-block;
		margin-bottom: 20px;
		
	}

	.dasboard-wrapper{
		margin: 1vw;
	}

	.header{
		margin-left: 40%;
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

	.search{
		margin-left: 60%;
		margin-bottom: 20px;
	}

	.hidden{
		border: hidden;
		background-color: transparent;

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
		background-blend-mode: soft-light;

	}

	.filter_err{
		margin-left: 86%;
		color: darkred;
		margin-bottom: 0px;
	}

	th{
		text-align: center;
	}

	td input{
		text-align: center;
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
	  text-decoration: none;
	}


    .nav-icon{
    	margin-left: 2%;
    }

    	.thead-pink{
		background-color: pink;
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
                    <li><img src="altria.png" width="80" height="35"></li>
                    <li style="color: white;"><a href="agent.php">HOME</a></li>
                    <li style="color: white;"><a href="view.php">HISTORY</a></li>
                    <li class="logout" style="color: white;"><a href="Controllers/logout_db.php">LOGOUT</a></li>

                </ul>
            </nav>
	<div class="dashboard-container">
		<div class="dasboard-wrapper">
	
			
			<div class="content">
				<div>
						<?php 
							if (isset($_SESSION['filter_err'])){
								echo "<div class='filter_err' id='hideMe'>" .  $_SESSION['filter_err'] . " </div>";
							}
						 ?>
				</div>
				<form  action="search.php" method="GET">
					<div class="tool-area container mb-3">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="input-group">
										<input type="text" placeholder="  Search" name="search" required>
											<select  placeholder=" Filter" class="custom-select" name="filter" id="filter" required>
												<option value="noval">Select filter</option>
											    <option value="fullname">Agent name</option>
											    <option value="order_id">Order ID</option>
											    <option value="cx_phone">Customer Phone</option>
											    <option value="disposition">Disposition</option>
											    <option value="amount">Amount</option>
											    <option value="timestamp">Date Modified</option>
										  </select>
									<button name="search_bt" type="submit" class="btn btn-sm btn-pink"><i class="fa fa-search"></i></button>	
								</div>			
							</div>
						</div>
					</div>
				</form>
				
				<table class="table table-striped">
					<thead class="thead-pink">
						<tr>
						<th scope="col"><label>Id</label></th>
						<th scope="col"><label>Full Name</label></th>
						<th scope="col"><label>Order ID</label> </th>
						<th scope="col"><label>Customer Phone</label> </th>
						<th scope="col"> <label>Disposition</label> </th>
						<th scope="col"> <label>Amount</label> </th>
						<th scope="col"> <label>Time</label> </th>
					</tr>
					
					</thead>
					<tbody>
							
						<?php

							if ($result->num_rows > 0) {
							  // output data of each row
							  while($row = $result->fetch_assoc()) {
							       echo "<tr>";
							       echo "<form action='edit.php' method='post'>";
							       echo "<td scope='col'> <input type='text' size='1' name='id' class='hidden' value=".$row['id']." disabled> </td>";
							       echo "<td scope='col'> <input type='text' size='14' name='fullname' class='hidden' value=\"" . $row["fullname"] . "\" disabled> </td>";
							       echo "<td scope='col'> <input type='text' id='order_id' size='14' name='order_id' class='hidden' value=\"" . $row["order_id"] . "\" disabled> </td>";
							       echo "<td scope='col'> <input type='text' size='10' name='cx_phone' class='hidden' value=".$row['cx_phone']." disabled> </td>";
							       echo "<td scope='col'> <input type='text' size='15' name='disposition' class='hidden' value=\"" . $row["disposition"] . "\" disabled> </td>";
							       echo "<td scope='col'> <input type='text' size='8' name='amount' class='hidden' disabled value=".$row['amount']."></td>";
							       echo "<td scope='col'> <input type='text' size='12' name='timestamp' class='hidden' disabled value=".$row['timestamp']." ></td>";
				                   echo "</form>";
				                   echo "</tr>";

								  }
							} 
							else {
							  echo "0 results";
							}

							$conn->close();

			            ?>

					</tbody>
					
						
				</table>
			</div>
		</div>
		
	</div>

</body>
</html>