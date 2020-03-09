<?php

namespace App\Http\Controllers\News;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use XmlParser;

class ParserController extends Controller
{
    private function parse()
    {
        $xml = XmlParser::load('https://news.yandex.ru/computers.rss');
        return $xml->parse([
            'category' => [
                'uses' => 'channel.title'
            ],
            'news' => [
                'uses' => 'channel.item[title,description]'
            ]
        ]);
    }

    public function index()
    {
        $data = $this->parse();
        return view('news.parser', ['list'=>$data['news'], 'category'=>$data['category']]);
    }

    public function save(){
        $data = $this->parse();
        $category = Category::query()->firstOrCreate(['title' => $data['category']]);
        foreach ($data['news'] as $news)
        {
            $n = new News();
            $n->title = $news['title'];
            $n->text  = $news['description'];
            $n->category_id = $category->id;
            $n->save();
        }
        return redirect()->route('news.index')->with('success', 'Сохранено!');
    }
}
