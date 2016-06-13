<?php
require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->title = "Home page";

$view->display(__DIR__ . '/App/templates/index.php');


