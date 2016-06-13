<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13.06.2016
 * Time: 12:35
 */

namespace App;


class View
{
    protected $list = [];

    public function __set($name, $value)
    {
        $this->list[$name] = $value;
    }

    public function __get($name)
    {
        return $this->list[$name];
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }
}