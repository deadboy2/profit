<?php

namespace App;

class View
{
    use TView;

    public function render($template)
    {
        ob_start();

        foreach ($this->data as $k => $v) {
            $$k = $v;
        }

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