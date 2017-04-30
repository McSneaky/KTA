<?php
require_once "Location.php";
class Character {
    
    private $name;
    private $expPoints;
    private $location;
    
    //konstruktor on ainult selle jaoks, et seada karakterile asukohaks 0. Hiljem peaks muidugi asukoha sisendi kuskilt mujalt
    //saama.
    public function __construct() {
        $this-> location = new Location(2, 3);
    }
    
    public function getName() {
        return $this-> name;
    } 
    
    public function getType() {
        return $this-> type;
    }  
    
    public function getExpPoints() {
        return $this-> name;
    }  
    
    public function getTools() {
        return $this-> tools;
    }

    public function getLocation(){
        return $this->location;
    }
    
    public function setName($name) {
        $this-> name = $name;
    }
    
    public function setType($type) {
        $this-> type = $type;
    }

    public function setExpPoints($expPoints) {
        $this-> expPoints = $expPoints;
    }
    
    public function setTools($tools) {
        $this-> name = $tools;
    }

    public function setLocation($location){
        $this->location = $location;
    }
    
    //liiguta karakterit kaardil ühe sammu võrra ülemisele ruudule. Tingimus on seatud selle pärast, et kaart saab mingil hetkel otsa.
    public function moveUp() {
        if($this-> location-> getY() < 4) { 
            $this-> location-> setY($this-> location -> getY() + 1);
        }
    }  
    
    //liiguta karakterit kaardil ühe sammu võrra alumisele ruudule.
    public function moveDown() {
        if($this-> location-> getY() > -4){
            $this-> location-> setY($this-> location -> getY() - 1);
        }
    }
    
    
    public function moveRight() {
       if($this-> location-> getX() < 4){
            $this-> location-> setX($this-> location -> getX() + 1);
        }
    }
    
    public function moveLeft() {
        if($this-> location-> getX() > -4){
            $this-> location-> setX($this-> location -> getX() - 1);
        }
    }
        
    
    
}