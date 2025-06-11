<?php

namespace App\Models\TypesModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM monster_types
            order by name asc;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
