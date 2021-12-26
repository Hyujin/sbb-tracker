<?php
 session_start();

  if (isset($_SESSION['loggedin'])) {
     
   }else {
      header('location: ../index.php');

   }

 // Create connection
	$conn = new mysqli('localhost', 'root', 'Altria123!@#', 'prog');
// Check connectionz
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, fullname, order_id, cx_phone, disposition, amount, date(timestamp) as d, time(timestamp) as t FROM transactions ORDER BY timestamp DESC";


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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      	
</head>
<style type="text/css" href="Assets/style.css"></style>
 <style type="text/css">
	body{
		max-width: 100%;
		overflow-x: hidden;
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

  nav{
  	position: sticky !important;
  	width: 100%;
  	z-index: 999;
  	top: 0;
  	left: 0;
  }

	button:hover {
	  background-color: lightblue;
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

	.note-texts{
		font-style: italic;
		color: grey;
		font-size: 16px;
		margin-left: 3%;
		margin-bottom: 5px;
	}

	.thead-pink{
		background-color: pink;
		position: sticky !important;
  	z-index: 999;
  	top: 6%;
  	left: 0;

	}

	th{
		text-align: center;
		position: sticky !important;
  	z-index: 999;
  	top: 6%;
  	left: 0;
	}

	td input{
		text-align: center;
	}


	.filter_err{
		margin-left: 87%;
		color: darkred;
	}

		#hideMe {
		    -moz-animation: cssAnimation 0s ease-in 8s forwards;
		    /* Firefox */
		    -webkit-animation: cssAnimation 0s ease-in 8s forwards;
		    /* Safari and Chrome */
		    -o-animation: cssAnimation 0s ease-in 8s forwards;
		    /* Opera */
		    animation: cssAnimation 0s ease-in 8s forwards;
		    -webkit-animation-fill-mode: forwards;
		    animation-fill-mode: forwards;
		}
		@keyframes cssAnimation {
		    to {
		        width:0;
		        height:0;
		        overflow:hidden;
		    }
		}
		@-webkit-keyframes cssAnimation {
		    to {
		        width:0;
		        height:0;
		        visibility:hidden;
		    }
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
	<script type="text/javascript">
	    document.getElementById("signup").onclick = function () {
	        location.href = "signup.php";
	    };
	</script>
<body>
		<nav class="navbar navbar-dark bg-pink navbar-sm">

	         <!-- <img src="../altria.png" class="nav-icon" width="95" height="55">&nbsp; -->
			<ul>
				<li><img src="../altria.png" width="80" height="35"></li>
				<li style="color: white;"><a href="edit.php">HOME</a></li>
				<li style="color: white;"><a href="signup.php">USERS</a></li>
				<li class="logout" style="color: white;"><a href="../Controllers/logout_db.php">LOGOUT</a></li>

			</ul>
		</nav>
	
	<div class="dashboard-container">
		<div class="dasboard-wrapper">
			
		<!-- 	<div class="header">
				<h3>Transactions</h3>
			</div> -->

			<div class="content">

				<!-- <button onclick="location.href = 'signup.php';" id="signup" class="btn btn-pink btn-sm" >Open User Control <i class="fa fa-arrow-right"></i></button> -->
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
												<option value="noval">Select Filter</option>
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

						
				<div>
					<p class="note-texts" id="hideMe">Tip: You may edit directly by clicking on the values and always click save to apply changes.</p>
				</div>
				<table class="table table-striped">
					<thead class="thead-pink">
						<tr>
							<th scope="col"><label>Id</label></th>
							<th scope="col"><label>Agent Name</label></th>
							<th scope="col"><label>Order ID</label></th>
							<th scope="col"><label>Customer Phone</label> </th>
							<th scope="col"> <label>Disposition</label> </th>
							<th scope="col"> <label>Amount</label> </th>
							<th scope="col"> <label>Date</label> </th>
							<th scope="col"> <label>Time</label> </th>
							<th scope="col-2"> <label>Actions</label> </th>
					    </tr>
					
					
					</thead>
					<tbody>
							
						<?php

							if ($result->num_rows > 0) {
							  // output data of each row
							  while($row = $result->fetch_assoc()) {
							  	   echo "<form action='../Controllers/update_db.php' method='POST'>";
							       echo "<tr>";
							       echo "<td scope='col'> <input type='text' size='1' name='id' class='hidden' value=".$row['id']." </td>";
							       echo "<td scope='col'> <input type='text' id='fullname' size='16' name='fullname' class='hidden' value=\"" . $row["fullname"] . "\" required> </td>";
							       echo "<td scope='col'> <input type='text' id='order_id' size='8' name='order_id' class='hidden' value=\"" . $row["order_id"] . "\" required> </td>";
							       echo "<td scope='col'> <input type='text id='cx_phone' size='10' name='cx_phone' class='hidden' value=".$row['cx_phone']." required></td>";
							       echo "<td scope='col'> <input type='text' id='disposition' size='15' name='disposition' class='hidden' value=\"" . $row["disposition"] . "\" required></td>";
							       echo "<td scope='col'> <input type='text' id='amount' size='8' name='amount' class='hidden' value=".$row['amount']." required></td>";
							       echo "<td scope='col'> <input type='text' id='date' size='8' name='date' class='hidden' value=".$row['d']."  disabled></td>";
							       echo "<td scope='col'> <input type='text' id='time' size='8' name='time' class='hidden' value=".$row['t']."  disabled></td>";
				                   echo "<td scope='col'> <button name='reg_user' class='btn btn-sm btn-pink'> save</button> </td>";
				                   //echo "<td scope='col'> <button name='reg_user' class='btn btn-sm btn-danger'> delete</button> </td>";
				                   	?>
									<?php


				                   echo "</tr>";
				                    echo "</form>";

								  }
							} 
							else {
							  echo "0 results";
							}

							$conn->close();

			            ?>

					</tbody>
					
						
				</table>

									<!-- Modal -->
					<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" style="margin-left: 28%" id="exampleModalLabel">Edit Transaction Entry</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        
					      	<div class="center">
		                		<label>Fullname</label>
		                    <?php  /*echo "<input class='fields' type='text' name='fullname' value=\"" . $row['fullname'] . "\" >"*/;  ?>
		                    
		                    <br>
		                	</div>
		                	<div class="center">
		                		<label>Customer Phone</label>
		                    <input class="fields" type="text" name="cx_phone" required> <br>
		                	</div>
		                    <div class="center">
		                    	<label>Disposition</label>
		                    <select name="disposition" class="fields" required>
		                    	<option value="Sales">Sales</option>
		                        <option value="Refund">Refund</option>
		                        <option value="Genera; Inquiry">General Inquiry</option>
		                        <option value="Reshipment Process">Reshipment Process</option>
		                        <option value="Reshipment Status">Reshipment Status</option>
		                        <option value="Order Status">Order Status</option>
		                    </select>
		                    <br>
		                    </div>
		                    <div class="center">
		                    	<label>Amount</label>
		                    	<input class="fields" type="amount" size="22" placeholder="Leave blank if unnecessary" name="amount">
		                    </div>


					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div> -->
					
					<!-- Edit Modal-->
				   <!--  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				        <div class="modal-dialog">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <h5 class="modal-title" style="margin-left: 28%" id="exampleModalLabel">Edit Transaction Entry</h5>
				                </div>
				                <div class="modal-body">
								<div class="container-fluid">
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Full name:</span>
										<input type="text" style="width:350px;" class="form-control" id="mfullname">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Customer phone:</span>
										<input type="text" style="width:350px;" class="form-control" id="mcx_phone">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Disposition:</span>
										<input type="text" style="width:350px;" class="form-control" id="mdisposition">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Amount:</span>
										<input type="text" style="width:350px;" class="form-control" id="mamount">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Timestamps:</span>
										<input type="text" style="width:350px;" class="form-control" id="mtimestamp">
									</div>

								</div>
								</div>
				                <div class="modal-footer">
				                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Update</button>
				                </div>
				            </div>
				        </div>
				    </div> -->

				     <!-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" style="margin-left: 28%" id="exampleModalLabel">Edit Transaction Record</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        

									        	<div class="form-group input-group">
													<span class="input-group-addon" style="width:150px;">Full name:</span>
													<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['fullname'] . "\">  "?>
												</div>
										      	
										      	<div class="form-group input-group">
													<span class="input-group-addon" style="width:150px;">Customer Phone:</span>
													<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['cx_phone'] . "\">  "?>
												</div>
        							            
							                   
							                    <div class="form-group input-group">
							                    	<span class="input-group-addon" style="width:150px;">Disposition:</span>
							                    <select name='disposition' class='form-group input-group select-style dropdown-toggle'  required>
							                    	"<option value=\"" . $row['disposition'] . "\"> " . $row['disposition'] . " </option> " ?>
							                    	<option value="Sales">Sales</option>
							                        <option value="Refund">Refund</option>
							                        <option value="Genera; Inquiry">General Inquiry</option>
							                        <option value="Reshipment Process">Reshipment Process</option>
							                        <option value="Reshipment Status">Reshipment Status</option>
							                        <option value="Order Status">Order Status</option>
							                    </select>
							                    <br>
							                    </div>

							                    <div class="form-group input-group">
													<span class="input-group-addon" style="width:150px;">Amount:</span>
													 echo "<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['amount'] . "\">  "?>
												</div>

										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="submit" class="btn btn-success">Save changes</button>
										      </div>
										    </div>
									    </form>;
									  </div>
									</div> -->

				<!-- /.modal -->




			</div>
		</div>
		
	</div>
	<script type="text/javascript">
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})

				$(document).ready(function(){
					$(document).on('click', '.edit', function(){
						var id=$(this).val();
						var fullname=$('#fullname'+id).text();
						var cx_phone=$('#cx_phone'+id).text();
						var disposition=$('#disposition'+id).text();
						var amount=$('#amount'+id).text();
						var amount=$('#timestamp'+id).text();
				 
						$('#edit').modal('show');
						$('#mfullname').val(fullname);
						$('#mcx_phone').val(cx_phone);
						$('#mdisposition').val(disposition);
						$('#mamount').val(amount);
					});
			});
	</script>

</body>
</html>