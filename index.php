
<?php

session_start();

/*if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}*/
if (!isset($_SESSION['log_err'])) {

}
else
{
    $notify =  $_SESSION['log_err'];
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
                margin-top: 15%;
                margin-left: 30%;
                position: center;
            }

            @media screen and (max-height: 768px){
                .login-container{
                display: inline-block;
                width: 40%;
                padding: 2vw;
                background-color: lightgrey;
                border-radius: 8px;
                margin-top: 5%;
                margin-left: 30%;
                position: center;
            }
            }

             @media screen and (max-height: 900px){
                .login-container{
                display: inline-block;
                width: 40%;
                padding: 2vw;
                background-color: lightgrey;
                border-radius: 8px;
                margin-top: 5%;
                margin-left: 30%;
                position: center;
            }

            h5{
                margin-left: 8%;
            }

            .form-title{
                font-family: sans-serif;
                font-style: bold;
                margin-top: 20px;
                
            }
            }


            button{
                background-color: #58CCED !important;
                color: black !important;
                border-color: transparent !important;
            }

            .login-button{
                width: 63%;
                margin-left: 20%;
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

              button:hover {
              background-color: pink !important;
              border-color: pink !important;
              color: black !important;
            }

            .fields{
                text-align: center;
                margin-top: 20px;
                margin-bottom: 5px;
                border-radius: 10px;
                border-color: transparent;
                height: 4%;
            }

            .form-title{
                font-family: sans-serif;
                font-style: bold;
                margin-top: 20px;
            }

            input{
                background-color: white;
                width: 80%;
            }

            select{
                width: 80%;
            }

            input{
                &.error
                {
                  animation: shake 0.2s ease-in-out 0s 2;
                  box-shadow: 0 0 0.5em red;
                }
            }

            @keyframes shake {
              0% { margin-left: 0rem; }
              25% { margin-left: 0.5rem; }
              75% { margin-left: -0.5rem; }
              100% { margin-left: 0rem; }
            }

            


            #grad-container {
              background-image: linear-gradient(to right, pink , lightblue);
            }

        </style>

        <script type="text/javascript">
            var JavaScriptAlert = <?php echo json_encode($notify); ?>;
            alert(JavaScriptAlert); // Your PHP alert!


            var element = document.getElementById('name');
            var addError = function() { element.classList.add('error'); };
            var removeError = function() { element.classList.remove('error'); };
                    </script>

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
        <div>
            <div class="login-container" id="grad-container">
            <div>
                <img src="altria.png" class="login-img-center">
            </div>
            <form  action="Controllers/login_db.php" method="post">
                <div class="login-center">
                    <div>
                    </div>
                    <div class="form-title" style="margin-left: 10%;">
                        <h5>Log in to SBB Disposition</h5>
                
                    </div>
                    <div>
                        <input class="fields" placeholder="  Full Name" type="text" id="fullname" name="fullname" onChange="removeError()" required> <br> 
                    </div>
                    <div>
                        <input class="fields" placeholder="  Password" type="password" name="password" required> <br>
                    </div>
                    <div>
                        <select name="usertype" class="form-group fields">
                            <option value="Agent">Agent</option>
                            <option value="Admin">Admin</option>
                            <option value="Client">Client</option>
                        </select> 
                    </div>
                    
                </div>
                
                <br>
                <button type="submit" onclick="addError();" class="btn btn-primary login-button">Login</button><br><br>
<!--                 <div>
                    <a class="login-img-center" href="#">Forgot Password?</a> <br>
                    <a class="login-img-center" href="signup.php">Create account</a>
                </div> -->
                
            </form>
        </div> 
        </div>
       

    </body>
</html>