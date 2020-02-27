<?php


namespace App\Models;
use Illuminate\Support\Facades\DB;

/**
 * Class Category
 * @package App\Models
 *
 * @property string title
 * @property int id
 */
class Category extends BaseModel
{
    protected $table = 'categories';

    protected $fillable = [
       'title'
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function getNews(int $id)
    {
        return News::query()->where('category_id', $id)->get();
    }
}
