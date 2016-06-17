<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->title = 'Home';
$view->users = \App\Models\User::findAll();

echo count($view);

$view->display(__DIR__ . '\App\templates\index.php');
