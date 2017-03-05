<?php 

/**
* wa
*/
class User extends Entity
{
	
	function __construct(argument)
	{
		# code...
	}

	public $name;

	private $exp;
	private $nextLevel;

	public function levelUp()
	{
		if ($this->exp >= $this->nextLevel) {
			makeLevelupSound();
			$this->save();
		}
	}
}

$user = new User();

$user->name;
$user->exp;


/**
* Axe
*/
class Axe extends Tools
{
	
	function __construct(argument)
	{
		
	}

	public $buildCost;

	public $health;

	public function use()
	{
		$this->healh--;
	}
}


$user->use($axe);