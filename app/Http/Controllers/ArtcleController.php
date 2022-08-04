<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArtcleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('articles', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                 // можем получить по соответствующему имени

    public function create() {
        $arr = [
            [
                'title' => 'Something beautiful',
                'content' => 'Very beautiful content',
                'image' => '',
                'likes' => 20,
                'is_published' => 1
            ],
            [
                'title' => 'Another something beautiful',
                'content' => 'Another very beautiful content',
                'image' => '',
                'likes' => 42,
                'is_published' => 0
            ],
        ];

        foreach ($arr as $item) {
            Article::create($item);
        }

        dd('Created');
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
