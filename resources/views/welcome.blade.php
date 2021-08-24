@extends('layouts.app')

@section('content')

    <div class="center jumbotron bg-warning">

        <div class="text-center text-white">
            <h1>YouTubeまとめ × SNS</h1>
        </div>

    </div>

    <div class="text-right">
        {{-- ログイン状態の時、ユーザ名を表示する --}}
        @if(Auth::check())
            {{ Auth::user()->name }}
        @endif
    </div>

@endsection