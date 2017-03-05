<?php 
include 'config.php';

// Check if there was POST request to current page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get entered username from user field
	$username = $_POST["user"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	// Make username and password input nice and tidy for DB
	$username = mysqli_real_escape_string($database, $username);
	$password = mysqli_real_escape_string($database, $password);
	$password2 = mysqli_real_escape_string($database, $password2);

	if ($password != $password2) {
		echo "Passwords missmach";
		echo "<button onclick='window.history.back();'>Back</button>";
		die(-1);
	}

	// Create insert statement
	$sql = "INSERT INTO users (name, password) VALUES ('$username', '$password')";

	// Run Query
	$result = mysqli_query($database, $sql);

	// Show some half random debug data
	die("New user: " .$username . " " . $password);
}