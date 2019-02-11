<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {

        $articles = Article::query()->where('is_show', true)->orderByDesc('id')->paginate();
        $categoryName = '随笔';
        return view('article.index', compact('articles', 'categoryName'));
    }

    public function show(Request $request, $id)
    {
        $article = Article::query()->where('id', $id)->first();
        $article->increment('click_count');
        return view('article.show', compact('article'));
    }
}
