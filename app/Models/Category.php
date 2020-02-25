<?php


namespace App\Models;
use Illuminate\Support\Facades\DB;


class Category extends BaseModel
{
    private static $tablename = 'categories';

    public static $array = [];

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

}
