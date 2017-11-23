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
function startTime($time)
{
    $now = strtotime('now');
    $timeBet = $now - $time;

    if (floor($timeBet / 60 / 60 / 24) >= 1) {
        $timeBet = gmdate('d.m.y в H:i', $time);
    } elseif (floor($timeBet / 60) >= 60) {
        $timeBet = floor($timeBet / 60 / 60) . ' часов назад';
    } elseif (floor($timeBet / 60) < 60) {
        $timeBet = gmdate('i минут назад', $time);
    };
    return $timeBet;
}

;
