<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //他ユーザーをフォローする機能
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }

    //フォローを外す機能
    public function destroy($id) {
        \Auth::user()->unfollow($id);
        return back();
    }
}
