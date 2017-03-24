<?php

class Kask {
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

$Nature = new Kask ("for building", "week", "wood", "Kask", "nature", 40, 60);

echo "<pre>\n";
echo "Kask values:\n";

$variables = get_object_vars($Nature);
print_r ($variables);

?> <img src="img/Kask.png" alt="Kask" />