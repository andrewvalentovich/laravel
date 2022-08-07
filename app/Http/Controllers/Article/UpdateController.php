<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Article $article)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);

        $article->update($data);
        $article->tags()->sync($tags);

        return redirect()->route('articles.show', compact('article'));
    }
}
