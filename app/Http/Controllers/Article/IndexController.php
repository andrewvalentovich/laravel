<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени
}
