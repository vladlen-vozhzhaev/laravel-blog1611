<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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
1) Регистрация +
2) Авторизация +
3) Личный кабинет (профиль) +
4) Форма загрузки статьи +
5) Форма редактирования статьи (ДЗ)
6) Страница со всеми статьями +
7) Страница со статьёй +

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

Route::view('/addArticle', 'pages.addArticle')->middleware(['auth']);
Route::post('/addArticle', [ArticleController::class, 'addArticle'])->middleware(['auth']);
Route::get('/article/{id}', [ArticleController::class, 'showArticle']);
Route::post('/addComment', [ArticleController::class, 'addComment'])->middleware(['auth']);
Route::get('/profile', function (){return view('pages.profile');})->middleware(['verified']);
Route::post('/changeAvatar', [UserController::class, 'changeAvatar'])->middleware(['auth']);
Route::post('/changeUserData', [UserController::class, 'changeUserData'])->middleware(['auth']);
Route::get('/secret', function (){
   dd("Секретная страница");
})->middleware(['auth','admin']);
Route::get('/deleteComment/{id}', [ArticleController::class, 'deleteComment'])->middleware(['auth', 'admin']);
require __DIR__.'/auth.php';
