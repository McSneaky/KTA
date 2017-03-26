<?php

class Marjapõõsas {
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

$Nature = new Marjapõõsas ("building/food", "week", "wood", "Marjapõõsas", "nature", 15, 2,20);

echo "<pre>\n";
echo "Marjapõõsas values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/Marjap%C3%B5%C3%B5sas.png" alt="Marjapõõsas" />