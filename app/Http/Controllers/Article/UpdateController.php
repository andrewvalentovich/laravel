<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Article $article)
    {
        $data = $request->validated();
        $article = $this->service->update($article, $data);
        return $article instanceof Article ? new ArticleResource($article) : $article;
//        return new ArticleResource($article);

//        return redirect()->route('articles.show', $article->id);
    }
}
