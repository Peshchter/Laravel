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
        return view('news.news', ['model' => News::query()->paginate(20)]);
    }

    public function get()
    {
        return response()
            ->json(News::all())
            ->header('Content-Disposition', 'attachment; filename = "news.json"')
            ->setEncodingOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function add(Request $request)
    {
        $item = new News();
        $category_list = Category::all();
        $result = $request->session()->exists('result') ?? null;
        $request->session()->forget('result');
        return view('news.add', compact(['item', 'category_list', 'result']));
    }

    public function save(Request $request)
    {
        $data = $request->input();
        $item = new News();
        $item->category_id  = $data['category_id'] ;
        $item->title  = $data['title'] ;
        $item->text  = $data['text'] ;

        $item->save();
        return redirect(route('news.add'))
            ->with('result', 'success');

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewsById(int $id)
    {
        $model = News::findOrFail($id);
        $cat = 'Не определена';
        if (!empty($model)) {
            $cat = Category::getById($model->category_id);
            return view('news.newsOne', ['model' => $model, 'category' => $cat]);
        } else {
            abort(404);
        }
    }

    public function destroy(News $news){
        $news->delete();
        return redirect()->back();
    }

    public function edit(News $news){
        $item = $news;
        $category_list = Category::all();
        $result = null;
        return view('news.add', compact(['item', 'category_list', 'result']));
    }

    public function update(Request $request, News $news){
        $news->fill($request->all());
        $news->update();
        return redirect( route('news.index'));
    }


}
