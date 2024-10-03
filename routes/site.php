<?php

use App\Http\Controllers\site\sitecontroller;
use Illuminate\Support\Facades\Route;

Route::prefix('devfolio')->name('devfolio.')->group(function() {

Route::get('/', [sitecontroller::class, 'index'])->name('index');
Route::get('/blog/{id}', [sitecontroller::class, 'blog'])->name('blog');
Route::post('blog-comment-data/blog-id/{blog_id}', [sitecontroller::class, 'blog_comment_data'])->name('blog-comment-data');
Route::get('/reply/{blog_id}/{comment_id}', [sitecontroller::class, 'reply'])->name('reply');
Route::post('/reply-data/{blog_id}/{comment_id}', [sitecontroller::class, 'reply_data'])->name('reply-data');

});
