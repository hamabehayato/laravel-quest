<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Movie;

class MoviesController extends Controller
{
    // movies/create画面
    public function create()
    {
        $user = \Auth::user();
        $movies = $user->movies()->orderBy('id', 'desc')->paginate(9);

        $data= [
            'user' => $user,
            'movies' => $movies,
        ];

        return view('movies.create', $data);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'url' => $request->url,
            'comment' => $request->commnet,
        ]);

        return back();
    }
}
