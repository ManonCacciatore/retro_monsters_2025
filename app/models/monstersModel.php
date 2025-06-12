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

function findAll(PDO $connexion, int $limit = 9, int $offset = 0): array
{
    $sql = "SELECT monsters.*, monster_types.name AS type_name
            FROM monsters
            JOIN monster_types ON monsters.type_id = monster_types.id
            ORDER BY monsters.created_at DESC
            LIMIT :limit OFFSET :offset;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->bindValue(':offset', $offset, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function countAll(PDO $connexion): int
{
    $sql = "SELECT COUNT(*) FROM monsters;";
    $rs = $connexion->query($sql);
    return (int) $rs->fetchColumn();
}


function findOneById(PDO $connexion, string $id)
{
    $sql = "SELECT monsters.*, monster_types.name AS type_name
            FROM monsters
            JOIN monster_types ON monsters.type_id = monster_types.id
            WHERE monsters.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
