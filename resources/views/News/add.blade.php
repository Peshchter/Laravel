@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить запись</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('news.add') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Название</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cat" class="col-md-4 col-form-label text-md-right">Категория</label>

                                <div class="col-md-6">
                                    <input id="cat" type="text" class="form-control @error('cat') is-invalid @enderror" name="cat" value="{{ old('cat') }}" required autocomplete="category">

                                    @error('cat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Текст</label>

                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control " name="text" value="{{ old('cat') }}" required autocomplete="text"s>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
