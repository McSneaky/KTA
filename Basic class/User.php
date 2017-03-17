<?php 

/**
* This is user object / class
*/
class User
{
	// Some properies (variables), that user has
	public $name;
	private $age;
	public $class;
	private $invSize;

	/**
	 * When making new user, then __construct is called
	 * 	in here we initialize it and populate some properies at the start
	 * @param String 	$name  	Name of user
	 * @param Integer 	$age   	Age of user
	 * @param String 	$class 	Class / role of user (hunter, builder etc)
	 */
	function __construct($name, $age, $class)
	{
		// Assign data sent from new User("Wasd", 22, 'Hunter');
		// 	in index.php
		$this->name = $name;
		$this->age = $age;
		$this->class = $class;

		// Check if class is Hunter. 
		// 	If Hunter, then make inventory smaller
		if ($class == "Hunter") {
			$this->invSize = 10;
		} else {
			$this->invSize = 15;
		}
	}

	/**
	 * Non-static (regular / dynamic) method / function
	 * 	Need to create new instance first, then we can call this method
	 * 	("new User()" to create new instance)
	 * 	
	 * @return echo 	Some random string
	 */
	public function makeSound()
	{
		echo "Ouch!";
	}

	/**
	 * Static method / function
	 * 	Static methods do not require new instance.
	 * 	(no "new User()" needed)
	 * 	
	 * @return Integer 	Just some random string
	 */
	public static function limbCount()
	{
		return '4';
	}
}