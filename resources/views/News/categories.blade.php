@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Список Разделов</h1>
                    </div>

                    <div class="card-body">
                        <div class="links" style="display: flex; flex-direction: column;">
                            @foreach($model as $item)
                                <a href="{{route('news.categories.byId', $item['id'] )}}">{{$item['title']}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
