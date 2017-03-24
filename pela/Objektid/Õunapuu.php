<?php

class Õunapuu {
    public $content;
    public $lifespan;
    public $material;
    public $name;
    public $type;
    public $weight;
    public $quantity;
    public $food;

    
    function __construct ($ct, $l, $m, $n, $t, $w, $q,$f) {
        $this->content = $ct;
        $this->lifespan = $l;
        $this->material = $m;
        $this->name = $n;
        $this->type = $t;                
        $this->weight = $w;
        $this->quantity = $q;
        $this->food = $f;
    }
        
}

$Nature = new Õunapuu ("building/food", "week", "wood", "Õunapuu", "nature", 20, 10,30);

echo "<pre>\n";
echo "Õunapuu values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/%C3%95unapuu.png" alt="Õunapuu" />