<?php

require_once __DIR__ . '/vendor/autoload.php';

use \AppDatabase\Database;

$db = Database::getInstance();

echo $db;

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
$routeur = new Routeur();
$routeur->routerRequete();
