<?php
$garageId = $_GET['id'] ?? null;
$clientId = 'clientb';
$jsonFileGarages = $_SERVER['DOCUMENT_ROOT'] . '/data/garages.json';
$garages = json_decode(file_get_contents($jsonFileGarages), true);

// Trouver le garage
$garage = null;
foreach ($garages as $g) {
    if ($g['id'] == $garageId && $g['customer'] === $clientId) {
        $garage = $g;
        break;
    }
}

// Affichage
echo "<h2>Détails du garage</h2>";
echo "<ul>";
echo "<li><strong>Nom :</strong> {$garage['title']}</li>";
echo "<li><strong>Adresse :</strong> {$garage['address']}</li>";
echo "</ul>";

// Bouton retour
echo "<button class='back-to-list'>← Retour à la liste</button>";
