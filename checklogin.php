<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	
	if (isset($_POST['submit'])) {

		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		

$servername = "127.0.0.1";
$_username = "root";
$_password = "root";
$dbname = "compsys_db";

// Create connection
$conn = mysqli_connect($servername, $_username, $_password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		
		// Selecting Database
		$query = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
		$valid = mysqli_query($conn, $query);
		
		if (!$valid) {
			$error = "Could not connect to the database!";
		}
		var_export($query);
		if (mysqli_num_rows($valid) == 1 ) {	
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: dashboard.php"); // Redirecting To Other Page
			} else {
			$error = "Username or Password is invalid! Please re-enter...";
		}
		mysqli_close($conn); // Closing Connection
	}
?>