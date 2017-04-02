<?php

$toolConfig = include_once './toolConfig.php';

class Tool {
    public $name;
    public $damage;
    public $defence;
    public $condition;
    public $inventory;
    public $lifespan;
    public $material;
    public $type;
    public $weight;
    
    /**
     * Construcor used at creating new instance
     * @param [type] $config [description]
     * @param [type] $damage [description]
     */
    function __construct ($config, $damage = null) {
    	// Get one object from config
    	$object = $this->getObject($config->object);

    	// Set tool name according to one from config
        $this->name = $object['name'];

        // Check if tool does damage or not
    	if (isset($damage)) {
        	$this->damage = $damage;
    	} else {
        	$this->damage = $config->damage;
    	}

    	// Check if tool type is shield (2 == shield)
    	// 	And set defence stat 
    	if ($object['type'] == 2) {
        	$this->defence = $config->defence;
    	} else {
        	$this->defence = 0;    		
    	}

    	// Set tool condition
        $this->condition = $config->condition;
        // Set tool inventory
        $this->inventory = null;
        // Set lifespan from config and assign it to tool
        $this->lifespan = $config->lifespan;
        // Set tool materjal from config object
        $this->material = $object['material'];
        // Set tool type from config object
        $this->type = $object['type'];      
        // Set tool weight
        $this->weight = $config->weight;
    }

    /**
     * Get random tool from tools config
     * @param  Array 	$objArray 		Array of tools
     * @return Object 	$objArray[i] 	Return randomly selected tool
     */
    private function getObject($objArray)
    {
    	$lenght = count($objArray) - 1;
    	$randNumber = rand(0, $lenght); 

    	return $objArray[$randNumber];
    }
        
}

// Create new tool
$tool = new Tool($toolConfig, 5);

// $Tool = new Tool (30, 5, 0, 30, "arrow", "day", "wood / rope", "Bow", "weapon", 10);


// Echo out tool data
// PRE tag is used to make formating lil better
echo "<pre>\n";
echo "Tool values:\n";
die(var_dump($tool));

// Show some random bow.png image
?> 
<img src="img/bow.png" alt="Bow" />