<?php
require_once "Character.php";

class User {
	
    //kasutajanimi
	private $username;
    //email
    private $email;
    //karakter
    private $character;
    
    public function __construct($username, $email) {
        $this-> username = $username;
        $this-> email = $email;
        $this-> character = new Character();
    }
 
    public function getUsername() {
        return $this-> username;
    }
    
    public function getEmail() {
        return $this-> email;
    }
    
    public function getCharacter() {
        return $this-> character;
    }
    
    public function setUsername($username) {
        $this-> username = $username;
    }
    
    public function setEmail($email) {
        $this-> email = $email;
    }
    
    public function setCharacter(Character $character) {
        $this-> character = $character;
    }
    
	
}
