<?php
session_start();
session_destroy();
$_SESSION['loggedin'] = FALSE;
echo $_SESSION['loggedin'];
header('location: ../../index.php')


?>