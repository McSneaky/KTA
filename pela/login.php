<?php
session_start();

// If user is already logged in, then redirect to index.php
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
	die();
}

$config = include_once './config.php';
include_once './dbconnect.php';

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
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: index.php");
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
