<?php

class Mänd {
    public $content;
    public $lifespan;
    public $material;
    public $name;
    public $type;
    public $weight;
    public $quantity;

    
    function __construct ($ct, $l, $m, $n, $t, $w, $q) {
        $this->content = $ct;
        $this->lifespan = $l;
        $this->material = $m;
        $this->name = $n;
        $this->type = $t;                
        $this->weight = $w;
        $this->quantity = $q;
    }
        
}

$Nature = new Mänd ("for building", "week", "wood", "Mänd", "nature", 40, 40);

echo "<pre>\n";
echo "Mänd values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/M%C3%A4nd.png" alt="Mänd" />