<?php

/**
 * @file
 */

error_reporting(E_ALL ^ E_NOTICE);

require __DIR__ . '/vendor/autoload.php';

$config = [
  'db_dsn' => 'mysql:host=database;dbname=memory_game',
  'db_user' => 'root',
  'db_pass' => '',
];
