<?php

namespace App\Models\RaretiesModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM rareties
            order by name asc;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
