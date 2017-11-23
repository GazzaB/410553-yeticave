<?php
require_once ('functions.php');

$content = renderTemplate('templates/lot.php',['lots' => $lots, 'bets' => $bets, 'categories' => $categories]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categories' => $categories, 'content' => $content]);

print($page);