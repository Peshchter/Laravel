<?php


namespace App\Models;


class News extends BaseModel
{
    private static $filename = 'news.json';

    public static $array = [];

    public function __construct()
    {
        if (file_exists(self::$filename)) {
            self::fileget();
        }
    }

    public static function filesave()
    {
        file_put_contents(self::$filename, stripslashes(json_encode(self::$array, JSON_PRETTY_PRINT)));
    }

    public static function fileget()
    {
        self::$array = json_decode(file_get_contents(self::$filename), true);

    }

    public static function init()
    {
        if (file_exists(self::$filename)) {
            self::fileget();
        }
    }
}

News::init();
