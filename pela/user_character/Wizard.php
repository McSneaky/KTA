<?php

class Wizard extends Character {
    
    private $speed = 2;
    private $type = 'Wizard';
    private $tools = array('magic wand', 'little showel', 'tall hat');
    
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