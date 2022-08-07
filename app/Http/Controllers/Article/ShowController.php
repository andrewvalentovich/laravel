<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
