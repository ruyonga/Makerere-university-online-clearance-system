<?php

// Inialize session
session_start();

// Include database connection settings
include('includes/config.inc');
//protect from mysql injection

$myusername= mysql_real_escape_string($_POST['username']);
$mypassword=mysql_real_escape_string($_POST['password']) ;
//create a select query
$sql = "SELECT * FROM students WHERE regnum = '$myusername' && stdnum = '$mypassword'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // start session
    $_SESSION['username'] = $_POST['username'];
    header('Location:clearanceform.php?msg="Welcome to student '.$myusername);
} else {
    header('Location:signin.php?msg="Wrong username or password"');
}


?>

