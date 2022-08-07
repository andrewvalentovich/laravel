<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Article $article)
    {
        $data = $request->validated();
        $this->service->update($article, $data);
        return redirect()->route('articles.show', $article->id);
    }
}
