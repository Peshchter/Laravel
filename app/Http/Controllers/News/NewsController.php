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
        return view('news.news', ['model' => News::getAll()]);
    }

    public function get()
    {
        return response()
            ->json(News::getAll())
            ->header('Content-Disposition', 'attachment; filename = "news.json"')
            ->setEncodingOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function add(Request $request)
    {
        $item = new News();
        $category_list = Category::getAll();
        $result = $request->session()->exists('result') ?? null;
        $request->session()->forget('result');
        return view('news.add', compact(['item', 'category_list', 'result']));
    }

    public function save(Request $request)
    {
        $data = $request->input();
        $item = new News();
        $item->category_id  = $data['cat'] ;
        $item->title  = $data['name'] ;
        $item->text  = $data['text'] ;

        News::saveToDB($item);
        return redirect(route('news.add'))
            ->with('result', 'success');

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewsById(int $id)
    {
        $model = News::getById($id);
        $cat = 'Не определена';
        if (!empty($model)) {
            $cat = Category::getById($model->category_id);
            return view('news.newsOne', ['model' => $model, 'category' => $cat]);
        } else {
            abort(404);
        }
    }


}
