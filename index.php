<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$newsController = new \App\Controllers\News();
$errorController = new \App\Controllers\Error();
$id = '';
$art = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

switch ($url) {
    case '/':
        $art = 'Index';
        break;
    case '/news/?id=' . $id:
        $art = 'One';
        break;
    default:
        $art = 'Index';
}

try {
    $newsController->action($art);
} catch (\App\Exceptions\Database $e) {
    $errorController->log = $e;
    $errorController->setLogg();
    $errorController->action($art);
}

