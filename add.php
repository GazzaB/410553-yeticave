<?php
require_once ('functions.php');

$content = renderTemplate('templates/add.php',['categories' => $categories]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categories' => $categories, 'content' => $content]);

print($page);