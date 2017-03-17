<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
	die();
}

$config = include_once 'config.php';
include_once 'dbconnect.php';


// Check if there was POST request to current page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get user data and exit it, so no SQL injections
	$name = mysqli_real_escape_string($database, $_POST['name']);
	$email = mysqli_real_escape_string($database, $_POST['email']);
	$password = mysqli_real_escape_string($database, $_POST['password']);
	$password2 = mysqli_real_escape_string($database, $_POST['password2']);
	
	$error = false;
	if($password != $password2) {
		$error = "Password and Confirm Password doesn't match";
	}

	if (!$error) {
		$password = hash('sha256', $password);

		$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
		$result = $database->query($sql);

		if ($result) {
			echo "All good, go log in";
			echo "<a href='./login.php'>Log in</a>";
		} else {
			$error = 'Something went wrong: ' . mysqli_error($database);
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>KTA-16E Register</title>
</head>
<body>

	<form method="post">
		<h1>Sign Up</h1>

		<div>
			<label>Name</label>
			<input type="text" name="name" placeholder="Name" required autofocus />
		</div>
		
		<div>
			<label>Email</label>
			<input type="text" name="email" placeholder="Email" required />
		</div>

		<div>
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" required />
		</div>

		<div>
			<label>Confirm Password</label>
			<input type="password" name="password2" placeholder="Confirm Password" required />
		</div>

		<input type="submit" value="Register" />
	</form>

	<div>
		<?php if (isset($error)) { 
			echo $error; 
		} ?>
	</div>

	<div>
		Already Registered? <a href="./login.php">Login Here</a>
	</div>
</body>
</html>



