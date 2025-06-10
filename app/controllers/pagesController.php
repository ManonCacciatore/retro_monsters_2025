<?php

namespace App\Controllers\PagesController;

use \PDO;

function homeAction(PDO $connexion)
{
    // Demander des données au modèle
    include_once '../app/models/monstersModel.php';
    $randomMonster = \App\Models\MonstersModel\findOne($connexion);
    $monsters = \App\Models\MonstersModel\findAll($connexion);

    // Charger la vue "home" dans $content

    global $content, $title;
    $title = 'HomePage';
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
