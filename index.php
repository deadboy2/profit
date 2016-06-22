<?php

require __DIR__ . '/autoload.php';

//$view = new \App\View();
//$view->news = \App\Models\News::getAll();

$user = new \App\Models\User();
$user->id = 6;
$user->delete();

//$view->display(__DIR__ . '/App/templates/index.php');