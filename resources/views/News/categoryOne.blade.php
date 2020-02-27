@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $model->title }}</h1>
                    </div>

                    <div class="card-body">
                        <h3>Список новостей</h3>
                        <div class="links" style="display: flex; flex-direction: column;">
                            @foreach($list as $item)
                                <a href="{{ route('news.byId', $item->id ) }}">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">{{ $list->links() }}</div>
            </div>
        </div>
    </div>
@endsection
