<?php

require_once 'includes/inc-db-connect.php';


function getOeuvres()
{
    global $dbh;

    $query = $dbh->query(
        'SELECT * FROM oeuvres'
    );

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function getOeuvreById(int $id): array|false
{
    global $dbh;

    $query = $dbh->prepare(
        'SELECT * FROM oeuvres WHERE id = :id'
    );

    $query->execute([
        'id' => $id
    ]);

    return $query->fetch(PDO::FETCH_ASSOC);
}

function addOeuvre(string $titre, string $artiste, string $image, string $description): bool
{
    global $dbh;

    $query = $dbh->prepare(
        'INSERT INTO oeuvres (titre, artiste, image, description)
         VALUES (:titre, :artiste, :image, :description)'
    );

    return $query->execute([
        'titre' => $titre,
        'artiste' => $artiste,
        'image' => $image,
        'description' => $description
    ]);
}