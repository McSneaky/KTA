<?php

return (object) array(
	'object' => array(
		array(
			'name' => 'Rabbit',
			'type' => 1,
			'damage' => rand(1, 3),
			'defence' => rand(1, 3),
			'health' => rand(10, 30),
			), array(
			'name' => 'Wolf',
			'type' => 2,
			'damage' => rand(3, 6),
			'defence' => rand(1, 3),
			'health' => rand(10, 70),
			), array(
			'name' => 'Bear',
			'type' => 3,
			'damage' => rand(3, 9),
			'defence' => rand(1, 3),
			'health' => rand(10, 50),
			), array(
			'name' => 'Fox',
			'type' => 4,
			'damage' => rand(1, 5),
			'defence' => rand(1, 3),
			'health' => rand(10, 40),
			)),
	'lifespan' => rand(24, 72),
	'material' => array('Meat'),

);
