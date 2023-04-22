<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(Request $request){
        $title = $request->title;
        $content = $request->contentField;
        $author = $request->author;
        $article = new \App\Models\Article();
        $article->title = $title; // Подготавливаем данные для столбца title
        $article->content = $content; // Подготавливаем данные для столбца content
        $article->author = $author; // Подготавливаем данные для столбца author
        $article->save(); // Сохраняем данные в таблицу articles
        return "Статья добавлена";
    }
    public function showArticle(Request $request){
        $id = $request->id;
        $article = Article::where('id', $id)->first();
        $comments = Comment::where('article_id', $id)->get(); // Возвращается массив(коллекция)
        foreach ($comments as $comment){
            $userId = $comment->user_id;
            $user = User::where('id', $userId)->first();
            $comment->username = $user->name;
        }
        return view('pages.article', ['article'=>$article, 'comments'=>$comments]);
    }
    public function addComment(Request $request){
        $commentField = $request->comment;
        $articleId = $request->articleId;
        $userId = auth()->user()->getAuthIdentifier(); // auth()->user() - это авторизованный пользователь
        $comment = new Comment();
        $comment->comment = $commentField;
        $comment->article_id = $articleId;
        $comment->user_id = $userId;
        $comment->save();
        return redirect()->intended('/article/'.$articleId);
    }
    public function deleteComment(Request $request){
        $commentId = $request->id;
        $comment = Comment::where('id', $commentId)->first();
        $comment->delete();
        return 'Комментарий удалён';
    }
}
