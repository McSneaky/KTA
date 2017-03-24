<?php

class Orav{
	
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
$Nature = new Orav ("Orav", 20, 5, "food", "day", "nature", 10);

echo "<pre>\n";
echo "Orav values:\n";

$variables = get_object_vars($Tool);
print_r ($variables);

?> <img src="img/Orav.png" alt="Orav" />