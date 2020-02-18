@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$model['title']}}</h1>
                    </div>

                    <div class="card-header">
                        <h3>Категория:
                            <a href="{{route('news.categories.byId', $category['id'])}}">{{$category['title']}}</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>{{$model['text']}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
