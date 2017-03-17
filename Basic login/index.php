<?php 
// coede

include 'config.php';

// Login link
echo '<a href="./login.html">login</a><br>';
echo '<a href="./register.html">register</a><br>';

// Start new session
session_start();

// Check if there was POST request to current page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get entered username from user field
	$username = $_POST["user"];
	$password = $_POST["password"];

	// Make username and password input nice and tidy for DB
	$username = mysqli_real_escape_string($database, $username);
	$password = mysqli_real_escape_string($database, $password);

	// Get user from DB
	$sql = "SELECT id FROM users WHERE name = '$username' and password = '$password'";

	// Get query results from DB
	$result = mysqli_query($database, $sql);

	// Fetch db result into array
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// Count db query results should be 1
	$count = mysqli_num_rows($result);

	// If got 1 user from db, no more, no less
	if ($count == 1) {

		// Set user into superglobal
		$_SESSION["login_user"] = $username;
		echo "Logged in<br>";
	} else {
		die("Cant log in");
	}
	// Get entered password from password field
}

// Check if session variable is set
if (isset($_SESSION["login_user"])) {
	echo "Hello " . $_SESSION['login_user'] . "";
} else {
	echo "string";
}