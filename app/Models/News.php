<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class News extends BaseModel
{
    protected $table = 'news';
    protected $fillable = [
      'title', 'category_id', 'text'
    ];

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getByCategoryId(int $id)
    {
        return News::query()->where('category_id', $id)->paginate(15);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id')->firstOrFail();
    }
}
