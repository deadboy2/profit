<?php

require __DIR__ . '/autoload.php';

$user = new \App\Models\User();
$user->name = 'Max';
$user->email = 'test@test.ru';
$user->insert();