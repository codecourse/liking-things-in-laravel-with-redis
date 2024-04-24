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

Route::post('/comments/{comment}/likes', function (Comment $comment) {
    $comment->addLike(auth()->user());

    return back();
})->name('comments.likes.store');

Route::delete('/comments/{comment}/likes', function (Comment $comment) {
    $comment->removeLike(auth()->user());

    return back();
})->name('comments.likes.destroy');
