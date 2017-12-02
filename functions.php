<?php
require_once('data.php');

function renderTemplate($way, $data)
{

    foreach ($data as $key => $value) {

    };
    $connect = require_once($way);

    return $connect;
}

;
function esc($row) {
    $row = htmlspecialchars($row);
    return $row;
}