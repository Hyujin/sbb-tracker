
<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
    
?>
<html>
    <head>
        <link href="Assets/style.css" rel="stylesheet">
        <style type="text/css">

            body{
                margin: 0px;
                max-width: 100%;
                overflow-x: hidden;
                background-color: white;
            }

            .login-container{
                position: relative;
                display: inline-block;
                width: 40%;
                padding: 2vw;
                background-color: lightgrey;
                border-radius: 8px;
                margin-top: 10%;
                margin-left: 30%;
                position: center;
            }

            .fields{
                margin: 10px;
            }

            .transaction-fields{
            	margin-left: 30%;
            }

            .login-button{
                margin-left: 60%;
            }

            .login-center{
                margin-left: 20%;
            }

            .login-img-center{
                margin-left: 30%;
            }

            .center{
            	 position: relative; /* or absolute */
				  top: 50%;
				  left: 20%;
            }

            #grad-container {
              background-image: linear-gradient(to right, pink , lightblue);
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
            
                .btn-pink{
                    background-color: #ffb6c1;
                }

                .bg-pink{
                    background-color: #ffb6c1;
                    color: black;
                }

                .navbar-sm{
                    height: 4vw;
                    box-shadow: 0px 1px 10px grey;
                    background-blend-mode: soft-light;

                }

                 ul{
                    width: 100%;
                 }

                 li{
                    float: left;
                    margin: 0px !important;
                 }

                 li a{
                    margin-left: 5% !important;
                    font-size: 12px;
                    font-family: sans-serif;
                    font-style: bold;
                    text-align: center;
                    color: black;
                    margin-top: -0.8vw;
                    padding-left: 10px;
                    text-decoration: none;
                }

                 button:hover{
                    background-color: pink !important;
                    border-color: pink !important;
                    color: black !important;
                }


                li a:hover {
                  color: #c7eeeb;
                  text-decoration: none;
                }


                .nav-icon{
                    margin-left: 2%;
                }

                #fname{
                    margin-left: 64px;
                }

                #oid{
                    margin-left: 68px;
                }

                #cxp{
                    margin-left: 11px;
                }

                #dispo{
                    margin-left: 50px;
                }

                #amnt{
                    margin-left: 72px;
                }

                #hideMe {
                    -moz-animation: cssAnimation 0s ease-in 2s forwards;
                    /* Firefox */
                    -webkit-animation: cssAnimation 0s ease-in 2s forwards;
                    /* Safari and Chrome */
                    -o-animation: cssAnimation 0s ease-in 2s forwards;
                    /* Opera */
                    animation: cssAnimation 0s ease-in 2s forwards;
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


  
                @media only screen and (max-width: 1024px) {

                 .login-container{
                        display: inline-block;
                        width: 50%;
                        padding: 2vw;
                        background-color: lightgrey;
                        border-radius: 8px;
                        margin-top: 10%;
                        margin-left: 25%;
                        position: center;
                    }    

                   #fname{
                    margin-left: 44px;
                }

                #oid{
                    margin-left: 48px;
                }

                #cxp{
                    margin-left: -11px;
                }

                #dispo{
                    margin-left: 30px;
                }

                #amnt{
                    margin-left: 52px;
                }
                }
         
        </style>	

        <script type="text/javascript">
                    var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
          close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
          }
        }
        </script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <style type="text/css">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       </style>
       
           <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       </script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-pink navbar-sm">

                 <!-- <img src="../altria.png" class="nav-icon" width="95" height="55">&nbsp; -->
                <ul>
                    <li><img src="altria.png" style="margin-right: 14px" width="80" height="35"></li>
                    <li style="color: white;"><a href="agent.php">HOME</a></li>
                    <li style="color: white;"><a href="view.php">HISTORY</a></li>
                    <li class="logout" style="color: white;"><a href="Controllers/logout_db.php">LOGOUT</a></li>

                </ul>
            </nav>


        <div>
            <div class="login-container" id="grad-container">
            <div>
                <img src="altria.png" class="login-img-center">
            </div>
            <form  action="Controllers/transaction_db.php" method="post">
                <div>

                    


                            <?php 
                                if(@$_GET['success']==true)
                                {
                            ?>
                                <div class="text-success text-center py-2" id="hideME"><?php echo $_GET['success'] ?></div>

                            <?php
                                }
                                $_GET['success'] = " ";

                    ?>


                	<div class="center">
                		<label>Fullname</label>
                    <?php  echo "<input class='fields' id='fname' type='text' name='fullname' value=\"" . $_SESSION['fullname'] . "\" >";  ?>
                    
                    <br>
                	</div>
                    <div class="center">
                        <label>Order ID</label>
                    <input class="fields" type="text" placeholder="Write zero if unnecessary" id='oid' name="order_id" required> <br>
                    </div>
                	<div class="center">
                		<label>Customer Phone</label>
                    <input class="fields" type="number" id='cxp' name="cx_phone" required> <br>
                   
                	</div>
                    <div class="center">
                    	<label>Disposition</label>
                    <select name="disposition" id='dispo' class="fields" required>
                    	<option value="Sales">Sales</option>
                        <option value="Refund">Refund</option>
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Reshipment Process">Reshipment Process</option>
                        <option value="Reshipment Status">Reshipment Status</option>
                        <option value="Order Status">Order Status</option>
                    </select>
                    <br>
                    </div>
                    <div class="center">
                    	<label>Amount</label>
                    	<input class="fields" id='amnt' type="number" step="0.01" size="22" placeholder="Leave blank if unnecessary" name="amount">
                    </div>
                    
                    
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary login-button" name="reg_user">Save transaction</button><br><br>
            </form>
        </div> 
        </div>
       

    </body>
</html>