<?php
$config = include_once './config.php';
include_once './user_character/User.php';
include_once './dbconnect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
		<?php 
			if ($_SESSION["user"]->getCharacter()) {
				echo "<pre>";
				var_dump($_SESSION["user"]);
				echo "</pre>";
				echo "Char on olemas";
			} else {
				echo "Char ei eksisteeri";
			}
 		?>		
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
		<button onclick="moveUp()">↑</button>
		<button onclick="moveDown()">↓</button>
		<button onclick="moveLeft()">←</button>
		<button onclick="moveRight()">→</button>
		<br>
		<br>
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

		/**
		 * Liikumis funktsioonid, üles, alla, vasakule, paremale
		 */
        function moveUp(){
        	/**
        	Algselt oli igas liikumise suunas selline lahendus, et kontrollida lava ja vee olemasolu
        	Aga kuna see on pikk korduv kood igas funktsioonis, siis tegime liikumise kontrollist 
        	eraldi funktsiooni checkMovement() all pool

			var selector = '#map > tbody > tr:nth-child(' + (user_y - 1) + ') > td:nth-child(' + (user_x) + ') > img';

			var element = jQuery(selector);

			// Liigume ainult siis, kui ei ole vesi
			if (!element.hasClass("water") && !element.hasClass("lava")) {
			}
			console.log('Move up123');
			*/
			if (checkMovement(user_x, user_y - 1)) {
				setUserLocation(user_x, user_y - 1);
			}
        }

        
		function moveDown() {
			// Liigume ainult siis, kui ei ole vesi ega laava
			if (checkMovement(user_x, user_y + 1)) {
				setUserLocation(user_x, user_y + 1);
			}
		}
		
		// Siis keegi võiks selle funktsiooni teha samamoodi ilusaks, nagu on ülejäänud liikumised
		// 	kasutades checkMovement() abifunktsiooni
        function moveLeft(){
            var selector = '#map > tbody > tr:nth-child(' + (user_y) + ') > td:nth-child(' + (user_x - 1) + ') > img';
            
            var element = jQuery(selector);
            
            console.log(element.hasClass('water'));
            
            if (!element.hasClass("water") && !element.hasClass("lava")){
				setUserLocation(user_x - 1, user_y);
			}
        }
		
		/**
		 * Move character, if there is nothing on the way
		 */
        function moveRight() {

			// Liigume ainult siis, kui ei ole vesi / lava
            if (checkMovement(user_x + 1, user_y)) {
				setUserLocation(user_x + 1, user_y);       
            }
        }

        /**
         * Kontrolli, ega seal ei ole vett ega laavat, kuhu kasutaja tahab järgmisena liikuda
         * @param  {int} 		next_x 	kasutaja järgmise sammu x kordinaat
         * @param  {int} 		next_y 	kasutaja järgmise sammu y kordinaat
         * @return {boolean}    		true, kui sammu saab teha
         */
        function checkMovement(next_x, next_y) {
        	// Tekitame selectori ruudule, kuhu liikuda tahame
			var selector = '#map > tbody > tr:nth-child(' + (next_y) + ') > td:nth-child(' + (next_x) + ') > img';

			// Selecteerime ruudu, mille selectori tegime eelmisel real
			var element = jQuery(selector);

			// Liigume ainult siis, kui ei ole vesi ega laava
			if (!element.hasClass("water") && !element.hasClass("lava")) {  
				return 	true;
			}
        }

	// See osa käivitub enne, kui document.ready sees olev
	console.log("run ASAP");
</script>

</body>
</html>
