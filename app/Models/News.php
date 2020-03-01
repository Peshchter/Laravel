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

    public static function rules(){
        $categoryTable = (new Category())->getTable();
        return [
            'title' => 'required | min:5 | max:30',
            'category_id' => "exists:{$categoryTable},id",
            'text' => 'required | min:20',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Необходимо указать заголовок',
            'text.required'  => 'Необходимо написать статью',
        ];
    }

    public static function attributeNames(){
        return [
            'title' => 'Название',
            'text'  => 'Текст',
            'category_id'  => 'Категория',
        ];
    }

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
