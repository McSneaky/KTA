<?php

/**
* 
*/
class animal
{
	
	public $name;
	public $health;
	// public $img; //pildi lisamine
	private $invSize;

	function __construct($name, $health, $invSize)
	{
		$this->name = $name;
		$this->health = $health;
		$this->invSize = $invSize; 

		if($name == "Wolf") {
			$this->invSize = 3;
		} else {
			$this->invSize = 15;
		}
	}
	//non-static (dynamic) function? rändom comment

	//static function
	public function roamMap()
	{
		if ($this->health > 0) {
			echo "elus";
			$timer = file_get_contents('countdown.js');
			echo "<script>".$timer."</script>";

			//countdown(); //näiteks 10min countdown
			//locationChange(); // valib rändomiga uue ruudu kuhu liikuda
		} else {
			echo "ei";
			//animalDie(); //dropib mingid itemid ja returnib mingile kindlale ruudule
		}
	}
}
