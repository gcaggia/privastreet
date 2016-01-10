<?php

require_once __DIR__ . '/vendor/autoload.php';

use \AppDatabase\Database;

$db = Database::getInstance();

echo $db;
