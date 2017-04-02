<?php

$animalConfig = include_once './animalConfig.php';

class animal {
    public $damage;
    public $defence;
    public $health;
    public $lifespan;
    public $material;
    public $name;
    public $type;
    
    function __construct ($config) {
    	$animal = $this->getObject($config->object);
    	$this->name = $animal['name'];


        $this->damage = $animal['damage'];
        $this->defence = $animal['defence'];
        $this->health = $animal['health'];
        $this->lifespan = $config->lifespan;
        $this->material = $config->material;
        $this->type = 'animal';             
    }
    

    private function getObject($objArray){
    	$lenght = count($objArray) - 1;
    	$randNumber = rand(0, $lenght);
    	return $objArray[$randNumber];
    }


}


echo "<pre>\n";
$animal = new animal($animalConfig);

echo "<pre>\n";
echo "animal values:\n";
die(var_dump($animal))


?>