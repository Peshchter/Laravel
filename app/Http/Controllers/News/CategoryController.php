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
        return view('news.categories', ['model' => Category::all()]);
    }

    public function getCategoryById(int $id)
    {
        $model = Category::findOrFail($id);
        if (!empty($model)){
            $list = News::getByCategoryId($model->id);
            return view('news.categoryOne', compact(['model','list']));
        }
        else {
            return abort(404);
        }
    }
}
