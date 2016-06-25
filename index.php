<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$act = '';
$id = '';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
}

$controller = new \App\Controllers\News();

switch ($url) {
    case '/':
        $act = 'Index';
        break;
    case '/news/?id=' . $id:
        $act = 'One';
        break;
    default:
        $act = 'Index';
}

$controller->action($act);