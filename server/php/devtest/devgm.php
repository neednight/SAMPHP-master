<?php

define('COLOR_WHITE', '0xFFFFFFFF');
define('COLOR_NORMAL_PLAYER', '0xFF4444FF');

Event::on('GameModeInit', function() {
	Server::setGameModeText("devGM v0.1 PHP");
	Server::showPlayerMarkers();
	Server::showNameTags();
	Server::setNameTagDrawDistance(40.0);
	Server::enableStuntBonus(false);
	Server::disableInteriorEnterExits();
	Server::setWeather(2);
	

	$classes = require 'classes.php';

	foreach($classes as $class)
		Server::addPlayerClass($class[0], $class[1], $class[2], $class[3], $class[4], $class[5], $class[6], $class[7], $class[8], $class[9], $class[10]);
});