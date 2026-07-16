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


function getOeuvreById($id)
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