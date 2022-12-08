<?php

/**
 * @file
 */

use Model\GameMatch;
use Service\Container;

require __DIR__ . '/bootstrap.php';

$size = $_POST["size"];
$mode = $_POST["mode"];
$inicialTime = $_POST["inicialTime"];
$finalTime = $_POST["finalTime"];
$score = $_POST["score"];
$userId = $_COOKIE["id"];

if ($mode === 'classic') {
  $time = $finalTime;
}
else {
  $time = $inicialTime - $finalTime;
}

$date = DateTime::createFromFormat("Y-m-d", date('Y-m-d'));

$container = new Container($config);

$gameMatch = new GameMatch(NULL, $size, $mode, $time, $date, $score, $userId);

$container->setGameMatch($gameMatch);
