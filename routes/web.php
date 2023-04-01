<?php

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

Route::get('/addArticle', function (){
   return view('pages.addArticle');
});
Route::post('/addArticle', function (\Illuminate\Http\Request $request){
    $title = $request->title;
    $content = $request->contentField;
    $author = $request->author;
    $article = new \App\Models\Article();
    $article->title = $title; // Подготавливаем данные для столбца title
    $article->content = $content; // Подготавливаем данные для столбца content
    $article->author = $author; // Подготавливаем данные для столбца author
    $article->save(); // Сохраняем данные в таблицу articles
    return "Статья добавлена";
});

require __DIR__.'/auth.php';
