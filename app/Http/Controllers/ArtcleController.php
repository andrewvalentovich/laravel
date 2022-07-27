<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArtcleController extends Controller
{
    public function index() {
        $articles = Article::all();
        foreach ($articles as $article) {
            dump($article->title);
        }
        dd('close');
    }

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
}
