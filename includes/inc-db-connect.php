<?php

// Chargement du fichier .env
$env = parse_ini_file(__DIR__ . '/../.env');

$_ENV['DB_NAME'] = $env['DB_NAME'];
$_ENV['DB_HOST'] = $env['DB_HOST'];
$_ENV['DB_USER'] = $env['DB_USER'];
$_ENV['DB_PASS'] = $env['DB_PASS'];


// Construction du DSN à partir des variables d'environnement
$dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] . ';charset=utf8mb4';

$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];


// Établissement de la connexion à la base de données
$dbh = new PDO($dsn, $user, $password);