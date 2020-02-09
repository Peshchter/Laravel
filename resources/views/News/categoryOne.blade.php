@extends('layouts.main')
@section('content')
    <h1>{{$model['title']}}</h1>
    <h2>Список новостей</h2>
    <div class="links" style="display: flex; flex-direction: column;">
        @foreach($list as $item)
            <a href="{{route('news.byId', $item['id'] )}}">{{$item['title']}}</a>
        @endforeach
    </div>

@endsection
