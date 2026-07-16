<?php

require_once 'includes/inc-db-connect.php';

$requete = $dbh->query("SELECT COUNT(*) FROM oeuvres");

$nombre = $requete->fetchColumn();

echo "Connexion OK<br>";
echo "Nombre d'œuvres dans la BDD : " . $nombre;