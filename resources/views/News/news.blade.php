@extends('layouts.main')
@section('content')
    <h1>Список новостей</h1>
    <div class="links" style="display: flex; flex-direction: column;">
        @foreach($model as $item)
            <a href="{{route('news.byId', $item['id'] )}}">{{$item['title']}}</a>
        @endforeach
    </div>

@endsection
