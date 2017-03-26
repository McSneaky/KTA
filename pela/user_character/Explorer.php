<?php

class Explorer extends Character {
    
    private $speed = 5;
    private $type = 'Explorer';
    private $tools = array('light shoes', 'map', 'binoculars');
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getSpeed() {
        return $this-> speed;
    }
   
    public function getType() {
        return $this-> type;
    }
    
    public function getTools() {
        return $this-> tools;
    }
    
}