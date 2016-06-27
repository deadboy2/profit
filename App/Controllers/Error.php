<?php

namespace App\Controllers;

use App\Logger;
use App\TController;
use App\TView;

class Error
{
    protected $logger;
    use TView;
    use TController;

    protected function actionIndex()
    {
        $this->view->error = $this->log;
        $this->view->display(__DIR__ . '/../templates/404.php');
    }

    protected function actionOne()
    {
        $this->view->error = $this->log;
        $this->view->display(__DIR__ . '/../templates/404.php');
    }

    public function setLogg()
    {
        $this->logger = new Logger();
        $this->logger->error = $this->log;
        $this->logger->write();
    }
}