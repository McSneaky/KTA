<?php

require_once './User.php';

// Tekitame uue kasutaja
$user = new User("Wasd", 22, 'Hunter');

// Seame kasutajale nime
$user->name = "Wasd";
echo $user->name;
echo "<br>";

// Seame kasutajale vamise
// Siin peaks viskama errorit, sest age on private ja seda ei saa väljastpoolt muuta
/*
$user->age = 12;
echo $user->age;
echo "<br>";
*/


// Teeme kasutaja h22lt
$user->makeSound();
echo "<br>";


// Useless line
User::limbCount();


echo User::limbCount();
// Kuvame kogu kasutaja v2lja

echo "<pre>";
die(var_dump($user));
?>