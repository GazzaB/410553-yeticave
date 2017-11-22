<?php
require_once('data.php');

function renderTemplate($way, $data)
{
    extract($data);
    $connect = require_once($way);

    return $connect;
}

;
function esc($row)
{
    $row = htmlspecialchars($row);

    return $row;
}

;