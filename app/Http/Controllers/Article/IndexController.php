<?php

namespace App\Http\Controllers\Article;

use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $current_page = $data['page'] ?? 1;
        $per_page = $data['per_page'] ?? 10;

        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $articles = Article::filter($filter)->orderBy('created_at', 'desc')->paginate($per_page, ['*'], 'page', $current_page);
        return ArticleResource::collection($articles);

//        return view('articles.index', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени
}
