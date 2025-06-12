<?php

namespace App\Controllers\MonstersController;

use \PDO;

function indexAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';

    // Récupération des filtres
    $type = $_GET['type'] ?? null;
    $rarete = $_GET['rarete'] ?? null;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 9;
    $offset = ($page - 1) * $limit;

    // Données filtrées
    $monsters = \App\Models\MonstersModel\findAll($connexion, $limit, $offset, $type, $rarete);
    $total = \App\Models\MonstersModel\countAll($connexion, $type, $rarete);
    $totalPages = ceil($total / $limit);

    // Pour la vue
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
