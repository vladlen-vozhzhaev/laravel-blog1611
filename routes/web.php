<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// uri = '/' - Это главная страница
Route::get('/', function () {
    // all() - это "SELECT * FROM articles"
    $articles = \App\Models\Article::all();
    return view('pages.mainPage', ['articles'=>$articles]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('/addArticle', 'pages.addArticle');
Route::post('/addArticle', [ArticleController::class, 'addArticle']);
Route::get('/article/{id}', [ArticleController::class, 'showArticle']);
Route::post('/addComment', [ArticleController::class, 'addComment']);

require __DIR__.'/auth.php';
