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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Some fast inline CSS -->
	<style type="text/css">

		/* 
		 * Current user location
		 *  
		*/
		#userLocaion{
			position: absolute;
			top: 15px;
			left: 15px;
		}

		/*
		 * Select all table cells
		 */
		#map td{
			position: relative;
		}
	</style>
</head>
<body>
	<!-- Check if user is logged in or not -->
	<?php if (isset($_SESSION['user'])) : ?>
		<!-- If user is logged in, then show logout and user name -->
		<p>
			Signed in as 
			<!-- Get user name form User object -->
			<?php echo $_SESSION["user"]->getUsername(); ?>
		</p>
		<br>

		<!-- Hard coded map -->
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

		<button>↓</button>
		<button>↑</button>
		<button>→</button>
		<button>←</button>

		<!-- Show log out link -->
		<a href="./logout.php">Log Out</a>

	<?php else : ?>
		<h1>Hello guest!</h1>
		<!-- If user is not logged in, then show register and loging in -->
		<a href="./login.php">Login</a><br>
		<a href="./register.php">Sign Up</a>
	<?php endif; ?>


<!-- Some half inline JS -->
<script type="text/javascript">

	// Wait for whole document to finish loading
	jQuery(document).ready(function() {
		// This "inReady" runs after "run ASAP"
		console.log("inReady");
		
		// ChangeUserLocaion
		setUserLocation(
			// Get user X cordinate
			<?php echo $_SESSION["user"]->getCharacter()->getLocation()->getX(); ?>,
			// Get user Y cordinate
			<?php echo $_SESSION["user"]->getCharacter()->getLocation()->getY(); ?>
		);

	});

	/**
	 * Set user locaion on map
	 * @param {int} 	x 	User x cordinate
	 * @param {int} 	y 	User y cordinate
	 */
	function setUserLocation(x, y) {

			// Selector to select right cell on map
			// tr:nth-child(1) selects first row 
			// tr:nth-child(2) selects second row
			// etc 
			var selector = '#map > tbody > tr:nth-child(' + (y + 1) + ') > td:nth-child(' + (x + 1) + ')';

			// Log selector to console for debugging
			console.log(selector);

			// Remove old user location
			jQuery('#userLocaion').remove();

			// Put user into new location
			// Append appends current table cell with given value
			jQuery(selector).append('<span id="userLocaion">X</span>');

			// Select map using pure JavaScript
			// document.getElementById('map');

			// Select map using jQuery
			// jQuery("#map");
		}
	// This will run before document.ready part
	console.log("run ASAP");
</script>
</body>
</html>
