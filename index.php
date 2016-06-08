<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db();
$res = $db->query('select * from foo');
