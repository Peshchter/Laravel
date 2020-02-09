<?php

namespace App\Http\Controllers\News;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        return view('news.categories', ['model' => Category::$array]);
    }

    public function getCategoryById($id = 0)
    {
        foreach (Category::$array as $item){
            if ($item['id'] == $id) {
                $model = $item;
            }
        }
        $list = [];
        if (!empty($model)){
            foreach (News::$array as $item){
                if ($item['category_id'] == $model['id']){
                    $list[] = $item;
                }
            }
            return view('news.categoryOne', ['model' =>$model, 'list'=>$list]);
        }
        else {
            return view('404');
        }
    }
}
