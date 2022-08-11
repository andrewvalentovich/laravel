<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $articles = Article::filter($filter)->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }
}
