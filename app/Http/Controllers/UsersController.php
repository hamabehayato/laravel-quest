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
}
