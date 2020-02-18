@extends('layouts.app')
@section('content')
    <h1>Список Разделов</h1>
    <div class="links" style="display: flex; flex-direction: column;">
        @foreach($model as $item)
            <a href="{{route('news.categories.byId', $item['id'] )}}">{{$item['title']}}</a>
        @endforeach
    </div>

@endsection
