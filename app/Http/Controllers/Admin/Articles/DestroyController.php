<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}
