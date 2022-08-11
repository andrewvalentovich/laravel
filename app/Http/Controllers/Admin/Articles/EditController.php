<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Article $article)
    {
        $articles = Article::paginate();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.edit', compact('articles', 'article', 'categories', 'tags'));
    }
}
