<?php



require_once 'User.php';

//tekitamne uue kasutaja
$animal = new animal("Wolf", 10, 3);

$animal->name = "Wolf";
echo $animal->name;
echo "<br>";
echo "health: ";
echo $animal->health;
echo "<br>";
// echo <img src="$animal->img">
$animal->roamMap();
?>

<!-- <img src="$user->img"> -->