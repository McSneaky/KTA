<?php

class Location {
    
    public $id;
    private $x;
    private $y;
    
    public function __construct($id, $x, $y) {
        $this-> id = $id;
        $this-> x = $x;
        $this-> y = $y;
    }
    
    public function getX() {
        return $this-> x;
    }  
    
    public function getY() {
        return $this-> y;
    }
    
    public function setX($x) {
        $this-> x = $x;
    } 
    
    public function setY($y) {
        $this-> y = $y;
    }
    
}


