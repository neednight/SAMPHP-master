<?php
require 'core/bootstrap.php';
require 'devtest/route.php';

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
	
    Server::addPlayerClass(0, 1958.3783, 1343.1572, 15.3746, 269.1425, 0, 0, 0, 0, 0, 0);
});

Command::Register('/memory', function($player) {
	$player->sendClientMessage(0xFFFFFFFF, "Memory Usage PHP: ".(memory_get_usage(false) / 1024)."KB (".(memory_get_usage(true) / 1024)."KB)");
});

Command::register('/garbage', function($player) {
	$player->sendClientMessage(0xFFFFFFFF, "Collected ".gc_collect_cycles()." cycles");
});

CMD::register('/rr', function($player) {
	GameModeExit();
});
?>
