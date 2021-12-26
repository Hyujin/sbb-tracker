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

          
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
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

	.tool-area{
		display: inline-block;
		
	}

	.search{
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
				<form action='edit_db.php' method='post'>

				<div class="tool-area">
					
				</div>

				<div class="search">
					<input type="text" name="search">
					<button class="btn btn-sm btn-primary">Search</button>			
				</div>
				<div class="save-changes">
					<button style="margin-left: 3%;" data-target='#edit' class='btn btn-sm btn-success edit'>Save Changes</button>
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
							       
							       echo "<td scope='col'> <input type='text' size='1' name='id' class='hidden' value=".$row['id']." </td>";
							       echo "<td scope='col'> <input type='text' id='fullname' size='14' name='fullname' class='hidden' value=\"" . $row["fullname"] . "\" </td>";
							       echo "<td scope='col'> <input type='text id='cx_phone' size='10' name='cx_phone' class='hidden' value=".$row['cx_phone']." </td>";
							       echo "<td scope='col'> <input type='text' id='disposition' size='15' name='disposition' class='hidden' value=\"" . $row["disposition"] . "\" </td>";
							       echo "<td scope='col'> <input type='text' id='amount' size='8' name='amount' class='hidden' value=".$row['amount']." </td>";
							       echo "<td scope='col'> <input type='text' id='timestamp' size='12' name='timestamp' class='hidden' value=".$row['timestamp']." </td>";
				                  
				                   	?>
								     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<?php echo "<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['fullname'] . "\">  "?>
												</div>
										      	
										      	<div class="form-group input-group">
													<span class="input-group-addon" style="width:150px;">Customer Phone:</span>
													<?php echo "<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['cx_phone'] . "\">  "?>
												</div>
        							            
							                   
							                    <div class="form-group input-group">
							                    	<span class="input-group-addon" style="width:150px;">Disposition:</span>
							                    <select name='disposition' class='form-group input-group select-style dropdown-toggle'  required>
							                    <?php echo	"<option value=\"" . $row['disposition'] . "\"> " . $row['disposition'] . " </option> " ?>
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
													<?php echo "<input type='text' style='width:350px;'' class='form-control' value=\"" . $row['amount'] . "\">  "?>
												</div>

										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="button" class="btn btn-success">Save changes</button>
										      </div>
										    </div>
									    </form>;
									  </div>
									</div>

								
									<?php


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