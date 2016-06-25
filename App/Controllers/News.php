<?php

namespace App\Controllers;

use App\View;

class News
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    protected function actionIndex()
    {
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        return $this->$methodName();
    }

}