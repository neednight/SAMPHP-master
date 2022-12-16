<?php
Event::on('PlayerConnect', function($player) {
	$player->gameText("~w~DevGM", 3000, 4);
	$player->sendClientMessage(COLOR_WHITE, "devGM v0.1 PHP");
});
?>