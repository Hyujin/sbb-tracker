
<?php
session_start();

 // Create connection
	$conn = new mysqli('localhost', 'root', '', 'prog');
// Check connectionz
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM transactions";
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
		background-color: lightgrey;
	}

	.dashboard-container{
		
		width: 80%;
		margin-left: 10%;
		margin-top: 5%;
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

	<div class="dashboard-container">
		<div class="dasboard-wrapper">
			
			<div class="header">
				<h3>Transactions</h3>
			</div>

			<div class="content">
				<div class="search">
					<label>Search</label>
					<input type="text" name="search">
					<button class="btn btn-sm btn-primary">Search</button>
					<a style="font-size:24px; margin-left: 15px; " class="fa" href="admin.php">&#xf021;</a>
				</div>
				
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
						<th scope="col"><label>Id</label></th>
						<th scope="col"><label>Full Name</label></th>
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