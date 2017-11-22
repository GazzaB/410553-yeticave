<?php
require_once('data.php');

function renderTemplate($way, $data)
{
    ob_start();
    extract($data);
    require_once($way);
    $result = ob_get_clean();
    return $result;
}

;
function esc($row)
{
    $row = htmlspecialchars($row);

    return $row;
}

;
