<?php
require 'core/bootstrap.php';
require 'devtest/autoload.php';

\autoload\autoload(__DIR__.'\Callbacks');
\autoload\autoload(__DIR__.'\Structures');


define('COLOR_WHITE', '0xFFFFFFFF');
define('COLOR_NORMAL_PLAYER', '0xFF4444FF');

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
