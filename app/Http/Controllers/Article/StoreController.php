<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
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
        $article = Article::create($data);
        $article->tags()->attach($tags);

        return redirect()->route('articles.index');
    }
}
