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

function findAll(PDO $connexion, int $limit = 9, int $offset = 0, ?string $type = null, ?string $rarete = null): array
{
    $sql = "SELECT monsters.*, monster_types.name AS type_name, rareties.name AS rarety_name
            FROM monsters
            JOIN monster_types ON monsters.type_id = monster_types.id
            JOIN rareties ON monsters.rarety_id = rareties.id
            WHERE 1=1";

    if ($type !== null) {
        $sql .= " AND monster_types.name = :type";
    }

    if ($rarete !== null) {
        $sql .= " AND rareties.name = :rarete";
    }

    $sql .= " ORDER BY monsters.created_at DESC
              LIMIT :limit OFFSET :offset";

    $stmt = $connexion->prepare($sql);

    if ($type !== null) {
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    }

    if ($rarete !== null) {
        $stmt->bindValue(':rarete', $rarete, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function countAll(PDO $connexion, ?string $type, ?string $rarete)
{
    $sql = "SELECT COUNT(*) as total
            FROM monsters m
            LEFT JOIN monster_types mt ON m.type_id = mt.id
            LEFT JOIN rareties r ON m.rarety_id = r.id
            WHERE 1=1";

    $params = [];

    if ($type) {
        $sql .= " AND mt.name = :type";
        $params[':type'] = $type;
    }

    if ($rarete) {
        $sql .= " AND r.name = :rarete";
        $params[':rarete'] = $rarete;
    }

    $stmt = $connexion->prepare($sql);
    $stmt->execute($params);
    return (int) $stmt->fetchColumn();
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
