<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';

    public $text;
    public $author_id;

    public function __get($name)
    {
        switch ($name) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($name)
    {
        switch ($name) {
            case 'author':
                return true;
                break;
            default:
                return false;
        }
    }
}