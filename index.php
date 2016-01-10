<?php

require_once __DIR__ . '/vendor/autoload.php';

use \AppDatabase\Database;
use \appClass\User;

$db = Database::getInstance();

echo $db;


echo '<br>';

if ($result = $db->queryLaunch("select count(*) as nb from t_USER")->fetch()) {
    echo $result->nb;
}

echo '<br>';
echo '<br>';
echo '<br>';

$myUser = new User();
$myUser->login("test", "test");

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
$routeur = new Routeur();
$routeur->routerRequete();
