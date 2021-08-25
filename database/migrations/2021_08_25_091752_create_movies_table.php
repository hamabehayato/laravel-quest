<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            //動画の連番
            $table->increments('id');
            //動画を登録したユーザのID
            //unsingned=マイナスの値は保持できなくなる index=index() が付けられたカラムのみを抽出できる
            $table->integer('user_id')->unsingned()->index();
            //youtube動画のURL
            $table->string('url');
            //動画に添えるコメント
            $table->string('comment')->nullable();
            //動画登録日時・動画更新日時
            $table->timestamps();
            
            //外部キー制約
            //('user_id')と、usersテーブルの('id')が一致しているものを紐づける。ユーザーが削除された場合は、紐づいた動画情報も一緒に削除される。
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
