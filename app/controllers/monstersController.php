<?php

namespace App\Controllers\MonstersController;

use \PDO;

function indexAction(PDO $connexion)
{
    // Demander des données au modèle
    include_once '../app/models/monstersModel.php';
    $monsters = \App\Models\MonstersModel\findAll($connexion);

    // Charger la vue "home" dans $content

    global $content, $title;
    $title = 'Catalogue';
    ob_start();
    include '../app/views/monsters/index.php';
    $content = ob_get_clean();
}
