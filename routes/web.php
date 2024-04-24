<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::logout();
Auth::loginUsingId(1);

Route::get('/', function () {
    return view('comments.index', [
        'comments' => Comment::latest()->get(),
    ]);
});
