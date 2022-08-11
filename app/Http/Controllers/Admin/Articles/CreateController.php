<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $articles = Article::paginate();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('articles', 'categories', 'tags'));
    }
}
