<?php


namespace App\Services\Article;


use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {

            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryIds($category);
            $tagIds = $this->getTagIds($tags);

            $article = Article::create($data);
            $article->tags()->attach($tagIds);

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();

        }

        return $article;
    }

    public function update($article, $data)
    {
        try {

            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryIdsWithUpdate($category);
            $tagIds = $this->getTagIdsWithUpdate($tags);

            $article->update($data);
            $article->tags()->sync($tagIds);

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();

        }

        return $article->fresh();
    }

    private function getCategoryIds(array $item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getTagIds(array $tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    private function getCategoryIdsWithUpdate(array $item)
    {
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }


    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
}
