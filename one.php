<?php
header('Content-Type: text/html; charset=utf-8');
require __DIR__ . '/autoload.php';

$controller = new \App\Controllers\News();
$controller->action('One');