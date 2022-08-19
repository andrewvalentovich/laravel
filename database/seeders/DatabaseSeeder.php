<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        $tags = Tag::factory(40)->create();
        $articles = Article::factory(300)->create();

        foreach ($articles as $article) {
            $tagsId = $tags->random(5)->pluck('id');
            $article->tags()->attach($tagsId);
        }
    }
}
