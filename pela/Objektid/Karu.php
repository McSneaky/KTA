<?php

class Karu{
	
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
$Nature = new Karu ("Karu", 20, 80, "food", "day", "nature", 60);

echo "<pre>\n";
echo "Karu values:\n";

$variables = get_object_vars($Tool);
print_r ($variables);

?> <img src="img/Karu.png" alt="Karu" />