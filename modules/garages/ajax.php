<?php

// Chemin des fichiers json
$jsonFileGarages = $_SERVER['DOCUMENT_ROOT'] . '/data/garages.json';

// Lecture des fichiers json
$garages = json_decode(file_get_contents($jsonFileGarages), true);

// Récupération du cookie client
$client = $_COOKIE['client'] ?? null;

// Filtrer les garages du client
$clientGarages = array_filter($garages, fn($g) => $g['customer'] === $client);

// Affichage des garages
echo "<h2>Garages du Client B</h2>";
echo "<ul>";
foreach ($clientGarages as $garage) {
    $id = $garage['id'];
    $title = $garage['title'];
    $address = $garage['address'];

    echo "<li class='edit-garage' data-id='$id' style='cursor:pointer; margin-bottom:10px;'>";
    echo "<strong>$title</strong><br>";
    echo "</li>";
}
echo "</ul>";
