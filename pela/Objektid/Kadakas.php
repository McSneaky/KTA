<?php

class Kadakas {
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

$Nature = new Kadakas ("for building", "week", "wood", "Kadakas", "nature", 10, 5);

echo "<pre>\n";
echo "Kadakas values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/Kadakas.png" alt="Kadakas" />