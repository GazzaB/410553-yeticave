<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $newLot = [];

    foreach ($form as $key => $item) {
        if ($item != '' and $item != 'Выберите категорию') {
            if ($key == 'lot-rate' or $key == 'lot-step') {
                if (ctype_digit($item)) {
                    $newLot[$key] = esc($item);
                } else {
                    $error[$key] = 'number';
                };
            } else {
                $newLot[$key] = esc($item);
            };
        } else {
            $error[$key] = '';
        };
    };

    if (is_uploaded_file($_FILES['lot-img']['tmp_name'])) {
        $fileTempName = $_FILES['lot-img']['tmp_name'];
        $fileName = $_FILES['lot-img']['name'];
        $lotDir = __DIR__.'\\img\\'.'new'.$fileName;
        $lotUrl = '/img/'.'new'.$fileName;
        move_uploaded_file($fileTempName, $lotDir);
    };
};
if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty($error)) {
    $lots = [
        'title' => $newLot['lot-name'],
        'category' => $newLot['category'],
        'price' => $newLot['lot-rate'],
        'url' => $lotUrl,
        'step' => $newLot['lot-step'],
        'message' => $newLot['message'],
    ];
    $content = renderTemplate('templates/lot.php',['lots' => $lots, 'bets' => $bets, 'categories' => $categories]);
} else {
    $content = renderTemplate('templates/add.php', ['categories' => $categories, 'lotUrl' => $lotUrl, 'error' => $error, 'newLot' => $newLot]);
}
$page = renderTemplate('templates/layout.php', ['title' => $title, 'categories' => $categories, 'content' => $content]);

print($page);