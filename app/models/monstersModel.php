<?php

namespace App\Models\MonstersModel;

use \PDO;

function findOne(PDO $connexion)
{
    $sql = "SELECT monsters.*, monster_types.name AS type_name
    FROM monsters
    JOIN monster_types ON monsters.type_id = monster_types.id
    ORDER BY RAND()
    LIMIT 1;";
    return $connexion->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $connexion, int $limit = 3): array
{
    $sql = "SELECT monsters.*, monster_types.name AS type_name
            FROM monsters
            JOIN monster_types ON monsters.type_id = monster_types.id
            ORDER BY monsters.created_at DESC
            LIMIT :limit;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
