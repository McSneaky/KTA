<?php

class Auk {
    public $damage;
    public $content;
    public $lifespan;
    public $material;
    public $name;
    public $type;
    
    function __construct ($d, $ct, $l, $m, $n, $t,) {
        $this->damage = $d;
        $this->content = $ct;
        $this->lifespan = $l;
        $this->material = $m;
        $this->name = $n;
        $this->type = $t;                
        
    }
        
}

$Nature = new Auk (40, "none", "day", "ground", "Auk", "nature");

echo "<pre>\n";
echo "Auk values:\n";

$variables = get_object_vars($Tool);
print_r ($variables);

?> <img src="img/Auk.png" alt="Auk" />