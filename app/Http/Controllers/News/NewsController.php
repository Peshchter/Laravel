<?php

namespace App\Http\Controllers\News;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends BaseController
{
    public function index()
    {
        return view('news.news', ['model' => News::$array]);
    }

    public function add()
    {
        return view('news.add');
    }

    public function getNewsById($id = 0)
    {
        foreach (News::$array as $item){
            if ($item['id'] == $id) {
                $model = $item;
            }
        }
        $cat = 'Не определена';
        if (!empty($model)){
            foreach (Category::$array as $c){
                if ($c['id'] == $model['category_id']){
                    $cat = $c;
                }
            }
            return view('news.newsOne', ['model' =>$model, 'category'=> $cat]);
        }
        else {
            return view('404');
        }

    }


}
