<?php

namespace App\Controllers;

use App\TController;

class Error
{
    public $log = [];
    use TController;

    protected function actionIndex()
    {
        $this->view->error = $this->log;
        $this->view->display(__DIR__ . '/../templates/404.php');
    }
}