<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArtcleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('articles.index', compact('articles')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени

    public function create() {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }                                                            // можем получить по соответствующему имени

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'category_id' => 'nullable',
            'description' => 'string',
            'image' => 'string',
            'content' => 'string'
        ]);

        $categories = Category::all();
        foreach ($categories as $category){
            if ($data['category_id'] == $category->name) {
                $data['category_id'] = $category->id;
                break;
            }
        }
        Article::create($data);
        return redirect()->route('articles.index');
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'string',
            'content' => 'string'
        ]);
        $article->update($data);
        return redirect()->route('articles.show', compact('article'));
    }

    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route('articles.index');
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
