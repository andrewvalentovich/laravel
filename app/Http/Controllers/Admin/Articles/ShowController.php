<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        $articles = Article::paginate();
        return view('admin.articles.show', compact('articles', 'article'));
    }
}
