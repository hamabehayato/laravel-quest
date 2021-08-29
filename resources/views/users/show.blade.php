@extends('layouts.app')

@section('content')

    {{-- ユーザ名を表示 --}}
    <h1>{{ $user->channel }}</h1>
    <h1 class="text-right">{{ $user->name }}</h1>

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

@if (Auth::id() == $user->id)
    
    <h3 class="mt-5">表示名の変更</h3>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6">
            {!! Form::open(['route' => 'rename', 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('channel', 'チャンネル名') !!}
                    {!! Form::text('channel', $user->channel, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新する？', ['class' => 'button btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>

@endif

@endsection