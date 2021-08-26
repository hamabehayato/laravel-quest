<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        //orderBy('id', 'desc') すべてのユーザをＩＤが新しい順（降順）に並び替える
        //paginate(9) 1ページに９名のユーザを取得する
        $users = User::orderBy('id', 'desc')->paginate(9);

        return view('welcome', [
            'users' => $users,
        ]);
    }
}
