<?php
require_once ('functions.php');

$content = renderTemplate('templates/index.php',['lots' => $lots, 'categories' => $categories]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categories' => $categories, 'content' => $content]);

print($page);