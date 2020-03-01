@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить запись</div>

                    <div class="card-body">
                        <form method="POST"
                              @if (isset($item->id)) action="{{ route('news.update', $item) }}"
                              @else                  action="{{ route('news.add')    }}"
                            @endif>
                            @csrf
                            @if(isset($item->id)) @method('PUT') @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ $item->title ?? old('title') }}" required autocomplete="title"
                                           autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория</label>

                                <div class="col-md-6">
                                    <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" required autocomplete="category_id">
                                        @foreach($category_list as $c)
                                            <option value="{{ $c->id }}" @if ($c->id == $item->category_id) selected @endif>
                                                {{ $c->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Текст</label>

                                <div class="col-md-6">
                                    <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text"
                                              required autocomplete="text">{{ $item->text ?? old('text') }}</textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row ">
                                <div class="d-flex col-md-4 justify-content-end">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
