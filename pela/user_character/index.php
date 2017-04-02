<?php

include 'User.php';
include 'Character.php';
include 'Wizard.php';
include 'Explorer.php';
include 'Location.php';

$user = new User("Maanus", "maanus@mail.ee");

$user-> setCharacter(new Wizard());
$user-> getCharacter()-> moveUp();
$user-> getCharacter()-> moveUp();
$user-> getCharacter()-> moveUp();
$user-> getCharacter()-> moveUp();
$user-> getCharacter()-> moveUp();
$user-> getCharacter()-> moveLeft();


var_dump($user);
?>



