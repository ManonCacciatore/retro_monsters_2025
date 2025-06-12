<?php

namespace App\Controllers\MonstersController;

use \PDO;

function indexAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';

    $limit = 9;
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($page - 1) * $limit;

    $monsters = \App\Models\MonstersModel\findAll($connexion, $limit, $offset);
    $totalMonsters = \App\Models\MonstersModel\countAll($connexion);
    $totalPages = ceil($totalMonsters / $limit);

    global $content, $title;
    $title = 'Catalogue';

    ob_start();
    extract([
        'monsters' => $monsters,
        'page' => $page,
        'totalPages' => $totalPages,
    ]);
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
