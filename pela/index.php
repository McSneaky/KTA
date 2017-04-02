<?php
$config = include_once './config.php';
include_once './user_character/User.php';
include_once './dbconnect.php';

session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>KTA-16E pela</title>
</head>
<body>
	<!-- Check if user is logged in or not -->
	<?php if (isset($_SESSION['user'])) : ?>

		<!-- If user is logged in, then show logout and user name -->
		<p>Signed in as 
            <pre>
            <?php var_dump($_SESSION['user']);?>
            </pre>
        </p>
    <br>
    
    <?php if ($_SESSION["user"]->character): ?>
    <?php endif; ?>
		<a href="./logout.php">Log Out</a>

	<?php else : ?>
		<h1>Hello guest!</h1>
		<!-- If user is not logged in, then show register and loging in -->
		<a href="./login.php">Login</a><br>
		<a href="./register.php">Sign Up</a>
</body>
</html>