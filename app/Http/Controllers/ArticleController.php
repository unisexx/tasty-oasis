<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('translations')->where('status', 1)->orderBy('id','desc')->paginate(2);
        return view('article', compact('articles'));
    }

    public function detail($id)
    {
        $article = Article::with('translations')->findOrFail($id)->translate(App::getLocale());
        return view('article-detail', compact('article'));
    }
}
