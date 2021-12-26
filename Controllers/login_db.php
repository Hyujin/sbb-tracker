<?php 

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'Altria123!@#';
$DATABASE_NAME = 'prog';

/*echo "fullname: " . $_POST['fullname'];
echo "<br>";
echo $_POST['usertype'];
echo "<br>";
echo $_POST['password'];
echo "<br>";*/


$fullname = $_POST['fullname'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['fullname'], $_POST['password']) ) {
  // Could not get the data that should have been sent.
  exit('Please fill both the username and password fields!');
}


    $usertype = $_POST['usertype'];
    echo $usertype;
    echo "<br>";

    switch ($usertype) {
        case 'Agent':
                            // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                if ($stmt = $con->prepare('SELECT fullname, password, usertype FROM agents WHERE fullname = ?')) {


                    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    $stmt->bind_param('s', $_POST['fullname']);


                   
                    $stmt->execute();
                    // Store the result so we can check if the account exists in the database.
                    $stmt->store_result();

                   if ($stmt->num_rows > 0) {

                        $stmt->bind_result($fullname, $pwd, $usertype);
                        $stmt->fetch();
                        // Account exists, now we verify the password.
                        // Note: remember to use password_hash in your registration file to store the hashed passwords.


                       
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        echo $password;
                        echo "<br>";
                        echo "user input password: ";
                        echo $hashed_password;
                        echo "<br>";
                        echo "db stored password: ";
                        echo $pwd;
                        

                        if (password_verify($password, $pwd)) {
                            // Verification success! User has logged-in!
                            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['name'] = $_POST['fullname'];
                            $_SESSION['fullname'] = $fullname;
                            echo "<br> was able to log in";
                            header('Location: ../agent.php');
                        } 
                        else {
                            
                            // Incorrect password
                            echo '<br> Password mismatch!';
                            $_SESSION['log_err'] = "Incorrect username and/or password";
                            echo "<br> wasn't able to log in";
                            header('location: ../index.php');
                        }

                    $stmt->close();
                }
                else
                {
                            echo 'query yielded no result';
                            $_SESSION['log_err'] = "No result found!. Check your username and/or password!";
                            echo "<br> wasn't able to log in";
                            header('location: ../index.php');
                }


                } else {
                    echo 'first if failed.';
                    $_SESSION['log_err'] = "No user found";
                    header('location: ../index.php');
                }
            break;
        
        case 'Admin':

                    echo "test case admin <br>";
                        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                    if ($stmt = $con->prepare('SELECT fullname, password, usertype FROM superusers WHERE fullname = ?')) {

                        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                        $stmt->bind_param('s', $_POST['fullname']);
                        $stmt->execute();
                        // Store the result so we can check if the account exists in the database.
                        $stmt->store_result();

                       if ($stmt->num_rows > 0) {
                            $stmt->bind_result($fullname, $pwd, $usertype);
                            $stmt->fetch();
                            // Account exists, now we verify the password.
                            // Note: remember to use password_hash in your registration file to store the hashed passwords.
                            if ($password == $pwd) {

                                echo $password;
                                echo "<br>";
                                echo $pwd;

                                // Verification success! User has logged-in!
                                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                                session_regenerate_id();
                                $_SESSION['loggedin'] = TRUE;
                                $_SESSION['admin'] = "true";
                                $_SESSION['name'] = $_POST['fullname'];
                                $_SESSION['fullname'] = $fullname;
                                header('Location: ../super/edit.php');
                                $stmt->close();
                            } else {
                                // Incorrect password
                                echo 'Incorrect admin username and/or password!';
                                $_SESSION['log_err'] = "Incorrect username and password";
                                header('location: ../index.php');
                                $stmt->close();
                            }

                        
                    }
                    else{
                                 echo 'No user found <br>';
                                $_SESSION['log_err'] = "No user found. Please check your username and password";
                               header('location: ../index.php');
                                $stmt->close();
                    }

                    } else {
                        echo 'There was an error connecting to database. Contact your Systems Administrator';
                        $_SESSION['log_err'] = "There was an error connecting to database. Contact your Systems Administrator";
                        header('location: ../index.php');
                    }
            break;

        case 'Client':

                                // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                    if ($stmt = $con->prepare('SELECT fullname, password, usertype FROM superusers WHERE fullname = ? LIMIT 1')) {


                        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                        $stmt->bind_param('s', $_POST['fullname']);
                        $stmt->execute();
                        // Store the result so we can check if the account exists in the database.
                        $stmt->store_result();

                       if ($stmt->num_rows > 0) {

                            $stmt->bind_result($fullname, $pwd, $usertype);
                            $stmt->fetch();
                            // Account exists, now we verify the password.
                            // Note: remember to use password_hash in your registration file to store the hashed passwords.
                            if ($password == $pwd) {
                                // Verification success! User has logged-in!
                                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                                session_regenerate_id();
                                $_SESSION['loggedin'] = TRUE;
                                $_SESSION['name'] = $_POST['fullname'];
                                $_SESSION['fullname'] = $fullname;
                                echo "<br> wasn't able to log in <br>";
                               header('Location: ../super/client/view.php');
                            } else {
                                // Incorrect password
                                echo 'Incorrect client username and/or password!';
                                $_SESSION['log_err'] = "Incorrect client username and/or password!";
                                header('location: ../index.php');
                            }

                        $stmt->close();
                    }
                    else
                    {
                                 echo 'Incorrect client username and/or password!';
                                $_SESSION['log_err'] = "Incorrect client username and/or password!";
                                header('location: ../index.php');
                    }


                    } else {
                        //echo $stmt;
                        echo "invalid password";
                        echo 'Invalid password.';
                        $_SESSION['log_err'] = "There was an error connecting to database. Contact your Systems Administrator";
                        header('location: ../index.php');
                    }
            break;

        default:
            echo "reached default break";
            header('location: ../index.php');
            break;
    }



//var_dump($stmt)




 ?>