<?php

namespace App\Controllers\MonstersController;

use \PDO;

function indexAction(PDO $connexion)
{
    // Demander des données au modèle
    include_once '../app/models/monstersModel.php';
    $monsters = \App\Models\MonstersModel\findAll($connexion, 9);

    // Charger la vue "home" dans $content

    global $content, $title;
    $title = 'Catalogue';
    ob_start();
    include '../app/views/monsters/index.php';
    $content = ob_get_clean();
}


function showAction(PDO $connexion, string $id)
{
    include '../app/models/monstersModel.php';
    $monster = \App\Models\MonstersModel\findOneById($connexion, $id);

    global $content, $title;
    $title = $monster['name'];
    ob_start();
    include '../app/views/monsters/show.php';
    $content = ob_get_clean();
}
