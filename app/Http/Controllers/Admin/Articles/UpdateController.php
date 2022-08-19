<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Article $article)
    {
        $data = $request->validated();
        $this->service->update($article, $data);
        return redirect()->route('admin.articles.show', $article->id);
    }
}
