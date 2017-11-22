<?php

require_once ('functions.php');

$content = renderTemplate('templates/index.php',['lots' => $lots, 'categorys' => $categories]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categorys' => $categories, 'content' => $content]);

print($page);