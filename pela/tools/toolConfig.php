<?php

/**
 * Make new tools half randmly
 */
return (object) array(
	'object' => array(
		array(
			'name' => 'Axe',
			'material' => 'Stone',
			'type' => 1,
		), array( 
			'name' => 'Shield',
			'material' => 'Wood',
			'type' => 2,
		)
	),
	'damage' => rand(1, 10),
	'defence' => rand(1, 10),
	'condition' => rand(25, 75),
	'lifespan' => rand(24, 72),
	'weight' => rand(2, 10),
);
