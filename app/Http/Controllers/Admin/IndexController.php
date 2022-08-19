<?php


namespace App\Http\Controllers\Admin;


use App\Models\Article;

class IndexController
{
    public function __invoke()
    {
        $articles = Article::paginate(10);
        return view('admin.index', compact('articles'));
    }
}
