
@extends('layouts.appn')
@section('content')
    <h1>{{$model['title']}}</h1>
    <h2>Категория: <a href="{{route('news.categories.byId', $category['id'])}}">{{$category['title']}}</a> </h2>
    <p>{{$model['text']}} </p>


@endsection
