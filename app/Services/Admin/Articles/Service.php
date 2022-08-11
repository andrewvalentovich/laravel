<?php


namespace App\Services\Admin\Articles;


use App\Models\Article;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $article = Article::create($data);
        $article->tags()->attach($tags);
    }

    public function update($article, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $article->update($data);
        $article->tags()->sync($tags);
    }
}
