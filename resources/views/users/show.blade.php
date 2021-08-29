@extends('layouts.app')

@section('content')

    {{-- ユーザ名を表示 --}}
    <h1>{{ $user->name }}</h1>

    <ul class="nav nav-tabs nav-justified mt-5 mb-2">
        {{-- /users/{id} にアクセスされたとき、class="active"にする(bootstrapのクラス) --}}
        <li class="nav-item nav-link {{ Request::is('users/' .$user->id) ? 'active' : ''}}">
            {{-- ヘルパー関数。link_to_routeはralavelの仕様上、上手く表示されないらしい。 --}}
            <a href="{{ route('users.show', ['id'=>$user->id]) }}">動画 <br>
                <div class="badge badge-secondary"> {{ $count_movies }} </div>
            </a>
        </li> 
        <li class="nav-item nav-link">
            <a href="" class="">フォロワー <br>
                <div class="badge badge-secondary"></div>
            </a>
        </li>
        <li class="nav-item nav-link">
            <a href="" class="">フォロー中 <br>
                <div class="badge badge-secondary"></div>
            </a>
        </li>
    </ul>

{{-- moviesコントローラのmoviesを取得し、変数$moviesに代入 --}}
@include('movies.movies', ['movies' => $movies])

@endsection