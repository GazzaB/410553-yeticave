<?php
require_once ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $formError = [];
    $newLot = [];

    if ($form['lot-name'] != '') {
        $lotName = esc($form['lot-name']);
        $newLot['title'] = $lotName;
    } else {
       $formError[] = 'lot-name';
    };
    if ($form['category'] != '' && $form['category'] != 'Выберите категорию') {
        $lotCategory = esc($form['category']);
        $newLot['category'] = $lotCategory;
    } else {
        $formError[] = 'category';
    };
    if ($form['message'] != '') {
        $lotMessage = esc($form['message']);
        $newLot['message'] = $lotMessage;
    } else {
        $formError[] = 'message';
    };
    if ($form['lot-rate'] != '') {
        $lotRate = esc($form['lot-rate']);
        $newLot['price'] = $lotRate;
    } else {
        $formError[] = 'lot-rate';
    };
    if ($form['lot-step'] != '') {
        $lotStep = esc($form['lot-step']);
        $newLot['step'] = $lotStep;
    } else {
        $formError[] = 'lot-step';
    };
    if ($form['lot-date'] != '') {
        $lotDate = esc($form['lot-date']);
        $newLot['date'] = $lotDate;
    } else {
        $formError[] = 'lot-date';
    };

    if (empty($formError)) {
        $lots[] = $newLot;
        $count = count($lots)-1;
        header('location: /lot.php?id='.$count);
    } else {
//        foreach ($formError as $item) {
//            print $item;
//        };
//        var_dump($formError);
        header('location: /add.php?'.$formError);
    };
};

$content = renderTemplate('templates/add.php',['categories' => $categories]);
$page = renderTemplate('templates/layout.php',['title' => $title, 'categories' => $categories, 'content' => $content]);

print($page);