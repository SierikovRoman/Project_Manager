<?php

require_once 'php/database_connections.php'; // Including database connections

session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
	$error = "email or Password is invalid";
}else {

// Define $email and $password
$email=$_POST['email'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
$email = pg_escape_string($email);
$password = pg_escape_string($password);
// Selecting Database
//$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = pg_query("SELECT * FROM member WHERE password='$password' AND email='$email'", $con);
$rows = pg_num_rows($query);

if ($rows == 1) {
	$_SESSION['login_user']=$email; // Initializing Session
	header("location: profile.php"); // Redirecting To Other Page
} else {
	$error = "Email or Password is invalid";
}

pg_close($con); // Closing Connection
}
}
?>