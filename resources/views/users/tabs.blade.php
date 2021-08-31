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
    <li class="nav-item nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">
        <a href="{{ route('followers',['id'=>$user->id]) }}" class="">フォロワー <br>
            <div class="badge badge-secondary"> {{$count_followers}} </div>
        </a>
    </li>
    <li class="nav-item nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">
        <a href="{{ route('followings',['id'=>$user->id]) }}" class="">フォロー中 <br>
            <div class="badge badge-secondary"> {{$count_followings}} </div>
        </a>
    </li>
</ul>