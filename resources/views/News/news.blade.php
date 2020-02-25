@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1>Список новостей</h1>
                        <div>

                            <a href="{{route('news.add')}}">
                                <button type="button" class="btn btn-secondary">Добавить</button>
                            </a>
                            <a href="{{route('news.get')}}">
                                <button type="button" class="btn btn-secondary">Скачать</button>
                            </a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="links" style="display: flex; flex-direction: column;">
                            @foreach($model as $item)
                                <a href="{{ route('news.byId', $item->id) }}">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
