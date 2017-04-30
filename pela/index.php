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
		#userLocation{
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
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		     </tr><tr>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="lava" src="./img/red.png" alt="green" height="42" width="42"></td>
				<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
				<td><img class="lava" src="./img/red.png" alt="red" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
			
			</tr><tr>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
				<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
				<td><img class="lava" src="./img/red.png" alt="red" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
			
		    </tr><tr>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
				<td><img src="./img/green.png" alt="red" height="42" width="42"></td>
				<td><img src="./img/green.png" alt="red" height="42" width="42"></td>
				<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
			
		    </tr><tr>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img src="./img/green.png" alt="green" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
				<td><img src="./img/yellow.png" alt="yellow" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		    </tr><tr>
				<td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		        <td><img class="water" src="./img/blue.png" alt="blue" height="42" width="42"></td>
		     </tr>
			</tbody>
		</table>
		<button onclick="moveDown()">↓</button>
		<button onclick="moveUp()">↑</button>
		<button onclick="moveRight()">→</button>
		<button onclick="moveLeft()">←</button>

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

	var user_x = 0;
	var user_y = 0;

	// Wait for whole document to finish loading
	jQuery(document).ready(function() {
		// This "inReady" runs after "run ASAP"
		console.log("inReady");
		
		// ChangeUserLocation
		setUserLocation(
			// Get user X cordinate
			<?php echo $_SESSION["user"]->getCharacter()->getLocation()->getX(); ?> + 1,
			// Get user Y cordinate
			<?php echo $_SESSION["user"]->getCharacter()->getLocation()->getY(); ?> + 1
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
			var selector = '#map > tbody > tr:nth-child(' + (y) + ') > td:nth-child(' + (x) + ')';

			user_x = (x);
			user_y = (y);
			// Log selector to console for debugging
			console.log(selector);

			// Remove old user location
			jQuery('#userLocation').remove();

			// Put user into new location
			// Append appends current table cell with given value
			jQuery(selector).append('<span id="userLocation">X</span>');

			// Select map using pure JavaScript
			// document.getElementById('map');

			// Select map using jQuery
			// jQuery("#map");
		}

		function moveDown() {
			var selector = '#map > tbody > tr:nth-child(' + (user_y + 1) + ') > td:nth-child(' + (user_x) + ') > img';

			var element = jQuery(selector);

			console.log(element.hasClass('water'));

			// Liigume ainult siis, kui ei ole vesi
			if (!element.hasClass("water") && !element.hasClass("lava")) {
				setUserLocation(user_x, user_y + 1);
			}
		}
    
        function moveRight() {
			var selector = '#map > tbody > tr:nth-child(' + (user_y) + ') > td:nth-child(' + (user_x + 1) + ') > img';

			var element = jQuery(selector);

			console.log(element.hasClass('water'));

			// Liigume ainult siis, kui ei ole vesi
			if (!element.hasClass("water")) {            
            setUserLocation(user_x + 1, user_y);
            }
        }

        function moveUp(){
			var selector = '#map > tbody > tr:nth-child(' + (user_y - 1) + ') > td:nth-child(' + (user_x) + ') > img';

			var element = jQuery(selector);

			// Liigume ainult siis, kui ei ole vesi
			if (!element.hasClass("lava")) {
				setUserLocation(user_x, user_y - 1);
			}
			console.log('Move up123');    
        }

        function moveLeft(){
            var selector = '#map > tbody > tr:nth-child(' + (user_y) + ') > td:nth-child(' + (user_x - 1) + ') > img';
            
            var element = jQuery(selector);
            
            console.log(element.hasClass('water'));
            
            if (!element.hasClass("water")) {
				setUserLocation(user_x - 1, user_y);
			}
			   
        }
	// This will run before document.ready part
	console.log("run ASAP");
</script>

</body>
</html>
