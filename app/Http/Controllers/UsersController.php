<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //indexアクション
    public function index()
    {
        //orderBy('id', 'desc') すべてのユーザをＩＤが新しい順（降順）に並び替える
        //paginate(9) 1ページに９名のユーザを取得する
        $users = User::orderBy('id', 'desc')->paginate(9);

        return view('welcome', [
            'users' => $users,
        ]);
    }

    //showアクション(ユーザー詳細)
    public function show($id)
    {   
        //idが一致するユーザーを検索
        $user = User::find($id);
        //user_idとidが一致するmovieを検索
        $movies = $user->movies()->orderBy('id', 'desc')->paginate(9);

        $data=[
            'user' => $user,
            'movies' => $movies,
        ];

        //$dataにcontroller.phpよりcounts($user)の戻り値を代入
        $data += $this->counts($user);

        return view('users.show', $data);
    }

    //renameアクション
    public function rename(Request $request)
    {
        $this->validate($request,[
            'channel' => 'required|max:15',
            'name' => 'required|max:15',
        ]);

        $user=\Auth::user();
        $movies = $user->movies()->orderBy('id', 'desc')->paginate(9);

        $user->channel = $request->name;
        $user->name = $request->name;
        $user->save();

        $data=[
            'user' => $user,
            'movies' => $movies,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }

    // ユーザ詳細ページにフォロー中＆フォローワーを表示する
    public function followings($id)
    {
        $user = user::find($id);
        $followings = $user->followings()->paginate(9);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(9);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
}
