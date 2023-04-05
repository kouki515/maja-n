<?php 

require_once('../config/config.php');

$mahjong = new \Controller\Mahjong();
$mahjong->run();

echo(count($mahjong->getDeck()));
echo PHP_EOL;
echo(count($mahjong->getHand()));
