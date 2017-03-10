<?php 

// Grab configuration file
$config = include_once '../config.php';


/// CREATE DATABASE


// Start new SQL connection
$connection = new mysqli($config->host, $config->username, $config->password);

// Check, if connection was success, if not, then show error message
if ($connection->connect_error) {
	die('Connection failed: ' . $connection->connect_error);
}

// Create our game database
$sql = "CREATE DATABASE " . $config->database;
runQuery($connection, $sql);

// Close current connection
$connection->close();


/// CREATE USERS TABLE


// And start new connection with freshly created DB selected
$connection = new mysqli($config->host, $config->username, $config->password, $config->database);

// Create users table and create values for them
$sql = "CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
password VARCHAR(64) NOT NULL
)";
runQuery($connection, $sql);

// Close current connection
$connection->close();




/**
 * SQL query runner with some really basic error management
 * @param  mysqli 	$connection 	SQL connection, where to run query
 * @param  string 	$sql 			SQL what to run
 * @return boolean	$result 		If query succeeded or failed
 */
function runQuery($connection, $sql)
{
	// Run SQL query and test, if it was success
	$result = $connection->query($sql);
	if ($result == true) {
		echo "Query succeeded <br>";
	} else {
		die("Error: " . mysqli_error($connection));
	}

	// Return query result
	return $result;
}