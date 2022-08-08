<?php

namespace App\Http\Controllers\Article;

use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Models\Article;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $articles = Article::filter($filter)->paginate(10);

        dd($articles);
        return view('articles.index', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени
}
