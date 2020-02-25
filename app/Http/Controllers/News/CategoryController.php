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
        return view('news.categories', ['model' => Category::getAll()]);
    }

    public function getCategoryById(int $id)
    {
        $model = Category::getById($id);
        if (!empty($model)){
            $list = News::getByCategoryId($model->id);
            return view('news.categoryOne', ['model' =>$model, 'list'=>$list]);
        }
        else {
            return abort(404);
        }
    }
}
