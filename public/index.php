<?php 

require_once('../config/config.php');

$mahjong = new \Controller\Mahjong(4);
$mahjong->run();

// echo(count($mahjong->getPile()));
echo PHP_EOL;
// echo(print_r($mahjong->getPlayerHnad()));
echo(print_r($mahjong->playerManager));
