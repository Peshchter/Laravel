@php
    /**
     * @param \Illuminate\Support\Collection | \App\Models\News $model
     */
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1>Список новостей по категории {{ $category }}</h1>
                        <div>
                            <a href="{{route('news.parser.save')}}">
                                <button type="button" class="btn btn-secondary">Сохранить в базу</button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="links" style="display: flex; flex-direction: column;">
                            @forelse($list as $item)
                                <div class="links ">
                                    <h3 >{{ $item['title'] }}</h3>
                                    <p >{{ $item['description'] }}</p>
                                </div>
                                <hr>
                            @empty
                                <p>По Вашему запросу новостей нет.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
