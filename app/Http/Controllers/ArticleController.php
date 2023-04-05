<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
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
        $comments = Comment::where('articleId', $id)->get(); // Возвращается массив(коллекция)
        return view('pages.article', ['article'=>$article, 'comments'=>$comments]);
    }
    public function addComment(Request $request){
        $commentField = $request->comment;
        $articleId = $request->articleId;
        $userId = auth()->user()->getAuthIdentifier();
        $comment = new Comment();
        $comment->comment = $commentField;
        $comment->article_id = $articleId;
        $comment->user_id = $userId;
        $comment->save();
        return redirect()->intended('/article/'.$articleId);
    }
}
