<?php

namespace App;

class Logger
{
    use TView;

    public function write()
    {
        $file = __DIR__ . '/logs/log.txt';
        file_put_contents($file, $this->data);

        $file = __DIR__ . '/logs/allLogs.txt';

        file_put_contents($file, PHP_EOL, FILE_APPEND);
        file_put_contents($file, $this->data, FILE_APPEND );
        file_put_contents($file, PHP_EOL, FILE_APPEND);
    }
}