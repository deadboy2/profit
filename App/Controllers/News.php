<?php

namespace App\Controllers;

use App\TController;

class News
{
    use TController;

    protected function actionIndex()
    {
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/one.php');
    }
}