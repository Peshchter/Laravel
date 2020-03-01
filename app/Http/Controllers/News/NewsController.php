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
        return view('news.add', compact(['item', 'category_list']));

    }

    public function save(Request $request)
    {
        $validatedData = $this->validate($request, News::rules(),[], News::attributeNames());
        $item = new News();
        $item->fill($validatedData);
        if ($item->save()) {
            return redirect()
                ->route('news.index')
                ->with('success', 'Успешно сохранено!');
        }else{
            return redirect()
                ->back()
                ->with('error', 'Ошибка добавления');
        }
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

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()
            ->back()
            ->with('error', 'Запись удалена!');
    }

    public function edit(News $news)
    {
        $item = $news;
        $category_list = Category::all();
        return view('news.add', compact(['item', 'category_list']));
    }

    public function update(Request $request, News $news)
    {
        $validatedData = $this->validate($request, News::rules(),[], News::attributeNames());
        $news->fill($validatedData);
        if($news->update())
        {
            return redirect(route('news.index'))
                ->with('success', 'Изменение произошло успешно');
        }else {
            return redirect()
                ->back()
                ->with('error', 'Ошибка сохранения');
        }

    }
}
