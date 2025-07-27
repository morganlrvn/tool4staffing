<?php
//on importe le fichier config.php pour avoir acces aux json
require_once dirname(__DIR__, 3) . '/config.php';

$cars = json_decode(file_get_contents(DATA_DIR . '/cars.json'), true);
$garages = json_decode(file_get_contents(DATA_DIR . '/garages.json'), true);

// Récupération du cookie client
$clientId = $_COOKIE['client'] ?? null;
$garageId = $_GET['id'] ?? null;

// Trouver le garage
$garage = null;
foreach ($garages as $g) {
    if ($g['id'] == $garageId && $g['customer'] === $clientId) {
        $garage = $g;
        break;
    }
}

// Affichage en détail des garages
echo "<h2>Détails du garage</h2>";
echo "<ul>";
echo "<li><strong>Nom :</strong> {$garage['title']}</li>";
echo "<li><strong>Adresse :</strong> {$garage['address']}</li>";
echo "</ul>";

// Bouton retour à la liste
echo "<button class='back-to-list'>← Retour à la liste</button>";
