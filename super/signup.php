
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

             body {
                background-color: lightgrey;
                margin:50px 0px; padding:0px;
                text-align:center;
                align:center;
            }   

            .login-container{
                display: inline-block;
                width: 40%;
                padding: 2vw;
                background-color: lightgrey;
                border-radius: 8px;
                margin-top: 10%;
                margin-left: 30%;s
                position: center;
            }

            .fields{
                margin: 10px;
            }

            .login-button{
                margin-left: 65%;
            }

            .login-center{
                margin-left: 20%;
            }

            .login-img-center{
                margin-left: 35%;
            }

            .center{
                position: relative;
                left: 50%;
                right: 50%;
            }


            .btn-pink{
                background-color: #ffb6c1;
            }

            .bg-pink{
                background-color: #ffb6c1;
                }

            .navbar-sm{
                    height: 4vw;
                    box-shadow: 0px 1px 10px grey;

                }

                ul {
                  margin-left: 5%;
                  list-style-type: none;
                  margin: 0px;
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
                  color: lightblue;
                  text-decoration: none;
                }

                 button:hover{
                    background-color: pink !important;
                    border-color: pink !important;
                    color: black !important;
                }



            .nav-icon{
                margin-left: 2%;
            }

            #grad-container {
              background-image: linear-gradient(to right, pink , lightblue);
            }

        </style>
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
    <body>
            <nav class="navbar navbar-dark bg-pink navbar-sm">
                 <!-- <img src="../altria.png" class="nav-icon" width="95" height="55">&nbsp; -->
                <ul>
                    <li><img src="../altria.png" width="80" height="35"></li>
                    <li style="color: white;"><a href="edit.php">HOME</a></li>
                    <li style="color: white;"><a href="signup.php">USERS</a></li>   
                </ul>
            </nav>
        <div>
            <div class="login-container" id="grad-container">
            <div>
                <img src="../altria.png" class="login-img-center">
            </div>
            <form  action="../Controllers/signup_db.php" method="post">
                
                <div class="login-center">
                    <div style="margin-left: 25%;">
                        <h5>Create Users</h5>
                        
                    </div>
                    <div>
                        <label>Fullname</label>
                        <input class="fields" type="text" name="fullname" required> <br> 
                    </div>
                    <div>
                        <label>Password</label>
                        <input class="fields" type="password" name="password" required> <br>
                    </div>
                    <div>
                       <label>User Type</label>
                        <select name="usertype" class="form-group fields">
                            <option value="Agent">Agent</option>
                            <option value="Agent">Admin</option>
                            <option value="Agent">Client</option>
                        </select> 
                    </div>
                    
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary login-button" name="reg_user">Create User!</button><br><br>
            </form>
        </div> 
        </div>
       

    </body>
</html>