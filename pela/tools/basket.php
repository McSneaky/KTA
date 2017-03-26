<?php

class Basket {
    public $damage;
    public $defence;
    public $carryWeight;
    public $condition;
    public $content;
    public $lifespan;
    public $material;
    public $name;
    public $type;
    public $weight;
    
    function __construct ($d, $de, $cw, $cd, $ct, $l, $m, $n, $t, $w) {
        $this->damage = $d;
        $this->defence = $de;
        $this->carryWeight = $cw;
        $this->condition = $cd;
        $this->content = $ct;
        $this->lifespan = $l;
        $this->material = $m;
        $this->name = $n;
        $this->type = $t;                
        $this->weight = $w;
    }
        
}

$Tool = new Basket (10, 5, 15, 30, "gooseberry", "day", "wood", "Basket", "inventory / tool", 5);

echo "<pre>\n";
echo "Basket values:\n";

$variables = get_object_vars($Tool);
print_r ($variables);

?> <img src="img/gathering.png" alt="Basket" />