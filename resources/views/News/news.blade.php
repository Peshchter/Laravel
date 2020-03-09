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
                        <h1>Список новостей</h1>
                        <div>

                            <a href="{{route('news.parser')}}">
                                <button type="button" class="btn btn-success">Загрузить с Яндекса</button>
                            </a>
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
                            @forelse($model as $item)
                                <div class="links d-flex justify-content-between">
                                    <a href="{{ route('news.byId', $item->id) }}"
                                       style="flex-grow: 1;">
                                        {{ $item->title }}</a>
                                    <div class="d-flex" style="flex-direction: row;">
                                        <a href="{{ route('news.edit', $item ) }}">
                                            <button type="button" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form action=" {{ route('news.destroy', $item ) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>По Вашему запросу новостей нет.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">{{ $model->links() }}</div>
            </div>
        </div>
    </div>
@endsection
