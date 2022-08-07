<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Article $article)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'category_id' => 'nullable',
            'tags' => 'required',
            'description' => 'required|string',
            'image' => 'required|string',
            'content' => 'required|string'
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $article->update($data);
        $article->tags()->sync($tags);
        return redirect()->route('articles.show', compact('article'));
    }
}
