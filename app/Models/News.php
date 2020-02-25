<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;


class News extends BaseModel
{
    public $category_id;
    public $title;
    public $text;

    private static $tablename = 'news';

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getAll()
    {
        return DB::table(self::$tablename)->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getById(int $id)
    {
        return DB::table(self::$tablename)->find($id);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getByCategoryId(int $id)
    {
        return DB::table(self::$tablename)->where('category_id', $id)->get();
    }

    /***
     * @param News $news
     * @return void
     */
    public static function saveToDB(News $news)
    {
        //dd(compact('news'));
        DB::table(self::$tablename)
            ->insert([
                'category_id' => $news->category_id,
                'title' => $news->title,
                'text' => $news->text
            ]);
    }


}
