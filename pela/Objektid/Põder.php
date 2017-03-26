<?php

class Põder{
	
	public $name;
	public $health;
    public $damage;
    public $content;
    public $lifespan;
    public $type;
    public $food;

	function __construct($name, $health, $damage, $content, $lifespan, $type, $f)
	{
		$this->name = $name;
		$this->health = $health;
        $this->damage = $damage;
        $this->content = $content;
        $this->lifespan = $lifespan;
        $this->type = $type;
        $this->food = $f;


		}
	}
$Nature = new Põder ("Põder", 20, 40, "food", "day", "nature", 55);

echo "<pre>\n";
echo "Põder values:\n";

$variables = get_object_vars($Tool);
print_r ($variables);

?> <img src="img/P%C3%B5der.png" alt="Põder" />