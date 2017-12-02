<?php

require_once ('functions.php');

$content = renderTemplate('templates/index.php',['lots' => $lots, 'categorys' => $categorys]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categorys' => $categorys, 'content' => $content]);

print($page);