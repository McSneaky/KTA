<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Require user
require_once './user_character/User.php';
require_once './user_character/Character.php';
require_once './user_character/Location.php';

$config = include_once './config.php';
include_once './dbconnect.php';

session_start();

// If user is already logged in, then redirect to index.php
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
	die();
}

// Check if there was POST request to current page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get user data and exit it, so no SQL injections
	$email = mysqli_real_escape_string($database, $_POST['email']);
	$password = mysqli_real_escape_string($database, $_POST['password']);

	// Hash password using sha256 hashing
	$password = hash('sha256', $password);

	// Create SQL query to ask for user where email and hashed password match
	$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";

	// Run database query
	$result = $database->query($sql);

	// Some random bulli kaka
	if ($row = mysqli_fetch_array($result)) {

		// Create new user with values from database
		$user = new User($row["id"], $row['name'], $row['email']);
		
		// Create SLQ query to ask for character who belongs to current user		
		$sql = "SELECT * FROM characters WHERE user_id = '$user->id'";

		// Run database query
		$result = $database->query($sql);

		// Fetch character query results
		if ($row = mysqli_fetch_array($result)) {
			
			// Get saved character data and assign it to character object
			$character = new Character($row["id"]);
			$character->setName = $row["name"];



			// Create SLQ query to ask for character location		
			$sql = "SELECT * FROM locations WHERE character_id = '$character->id'";

			// Run database query
			$result = $database->query($sql);

			// Fetch location and assign it to character
			if ($row = mysqli_fetch_array($result)) {
				$location = new Location($row["id"], $row["x"], $row["y"]);

				// And set location to character
				$character->setLocation($location);
			}

			// Set charater to user
			$user->setCharacter();
		}
		
		// Save user to session
		$_SESSION['user'] = $user;
		
		// Redirect to index
		header("Location: index.php");
		// Stop server, so bots will move away
		die("Stop ignoring headers!");

	} else {
		$errormsg = "Incorrect Email or Password!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>KTA-16E Login</title>
</head>
<body>

	<form method="post">
			<h1>Login</h1>
			
			<div>
				<label>Email</label>
				<input type="text" name="email" placeholder="Email" autofocus required />
			</div>

			<div>
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" required />
			</div>

			<input type="submit" value="Log in" />
	</form>

	<h2> 
		<!-- if login error exists, then show it -->
		<?php if (isset($errormsg)) { 
			echo $errormsg; 
		} ?> 
	</h2>

	<div>
		New User? <a href="./register.php">Sign Up Here</a>
	</div>

</body>
</html>
