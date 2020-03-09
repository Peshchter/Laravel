@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1>Список пользователей</h1>
                    </div>
                    <div class="card-body">
                        <div class="links" style="display: flex; flex-direction: column;">
                            @forelse($model as $user)
                                <div class="links d-flex justify-content-between">
                                    <a href="{{ route('user.edit', $user) }}" style="flex-grow: 1;">
                                        {{ $user->name }}</a>
                                    <div class="d-flex" style="flex-direction: row;">
                                        <form action=" {{ route("users.toggle", $user ) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            @if($user->isAdmin)
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Понизить статус
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Повысить статус
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>Список пуст</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">{{ $model->links() }}</div>
            </div>
        </div>
    </div>
@endsection
