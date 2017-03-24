<?php

class Kuusk {
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

$Nature = new Kuusk ("for building", "week", "wood", "Kuusk", "nature", 40, 80);

echo "<pre>\n";
echo "Kuusk values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/Kuusk.png" alt="Kuusk" />