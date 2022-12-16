<?php
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
?>
