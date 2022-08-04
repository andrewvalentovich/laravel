<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArtcleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('article.index', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени

    public function create() {
        return view('article.create');
    }                                                            // можем получить по соответствующему имени

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'image' => 'string',
            'content' => 'string'
        ]);
        Article::create($data);
        return redirect()->route('articles.index');
    }

    public function show(Article $article) {
        dd($article->title);
    }

    public function update() {
        $article = Article::find(2);
        $article->update([
            'title' => 'Updated something beautiful',
            'content' => 'Updated very beautiful content'
        ]);

        dd('Updated');
    }

    public function delete() {
        $article = Article::withTrashed()->find(2);
        $article->restore();

        dd('Deleted');
    }

    public function firstOrCreate() {
        $article = Article::firstOrCreate([
            'title' => 'Something beautiful'
        ],[
            'title' => 'Something ugly',
            'content' => 'Very ugly content',
            'image' => '',
            'likes' => 20,
            'is_published' => 1
        ]);

        dump($article->title);
        dd('First or create');
    }

    public function updateOrCreate() {
        $article = Article::updateOrCreate([
            'title' => 'Something ugly'
        ],[
            'title' => 'Something ugly',
            'content' => 'Very smart content',
            'image' => '',
            'likes' => 100,
            'is_published' => 1
        ]);

        dump($article->title);
        dd('Update or create');
    }
}
