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

    public function get()
    {
        return response()
            ->json(News::$array)
            ->header('Content-Disposition', 'attachment; filename = "news.json"')
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    public function add(Request $request)
    {
        $item = new News();
        $category_list = Category::$array;
        $result = $request->session()->exists('result') ?? null;
        $request->session()->forget('result');
        return view('news.add', compact(['item', 'category_list', 'result']));
    }

    public function save(Request $request)
    {
        $data = $request->input();
        $item = [];
        $item['category_id'] = $data['cat'];
        $item['title'] = $data['name'];
        $item['text'] = $data['text'];
        $max = 0;

        foreach (News::$array as $element) {
            $element['id'] > $max ? $max = $element['id'] : null;
        }
        $item['id'] = $max + 1;
        News::$array[] = $item;
        News::filesave();
        return redirect(route('news.add'))
            ->with('result', 'success');

    }

    public function getNewsById($id = 0)
    {
        foreach (News::$array as $item) {
            if ($item['id'] == $id) {
                $model = $item;
            }
        }
        $cat = 'Не определена';
        if (!empty($model)) {
            foreach (Category::$array as $c) {
                if ($c['id'] == $model['category_id']) {
                    $cat = $c;
                }
            }
            return view('news.newsOne', ['model' => $model, 'category' => $cat]);
        } else {
            return view('404');
        }

    }


}
