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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>
<body>
	<!-- Check if user is logged in or not -->
	<?php if (isset($_SESSION['user'])) : ?>
		<!-- If user is logged in, then show logout and user name -->
		<p>Signed in as 
			<pre>
				<?php var_dump($_SESSION["user"]); ?>
			</pre>
		</p>
		<br>

<table id="map" cellpadding="0" cellspacing="0">
	<tbody>
    <tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
     </tr><tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/green.png" alt="green" height="42" width="42"></td>
		<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
		<td><img src="./img/red.png" alt="red" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
	
	</tr><tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
		<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
		<td><img src="./img/red.png" alt="red" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
	
    </tr><tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
		<td><img src="./img/red.png" alt="red" height="42" width="42"></td>
        <td><img src="./img/green.png" alt="green" height="42" width="42"></td>
		<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
	
    </tr><tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/green.png" alt="green" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
		<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
    </tr><tr>
		<td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
        <td><img src="./img/blue.png" alt="blue" height="42" width="42"></td>
     </tr>
	</tbody>
</table>
		<pre>

		<a href="./logout.php">Log Out</a>

	<?php else : ?>
		<h1>Hello guest!</h1>
		<!-- If user is not logged in, then show register and loging in -->
		<a href="./login.php">Login</a><br>
		<a href="./register.php">Sign Up</a>
	<?php endif; ?>

<script type="text/javascript">
    //$(document).ready(function() {
    jQuery(document).ready(function() {
        
        setUserLocation(
            <?php echo $user->character->location->x; ?>
        );
        
    function setUserLocation(x, y) {
        console.log($("#map"));
        }
    });
</script>

</body>
</html>
