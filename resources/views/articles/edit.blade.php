@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8" style="margin: 0 auto;">
                <h1>Create article</h1>
                <form action="{{ route('articles.update', ['article' => $article]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input type="text" value="{{ $article->title }}" name="title" class="form-control" id="articleTitle" aria-describedby="articleTitle">
                        <div id="articleTitle" class="form-text">We'll never share your title with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="selectCategory" class="form-label">Select category</label>
                        <select name="category_id" id="selectCategory"  class="form-select">
                            <option value>None</option>
                            @foreach($categories as $category)
                                <option
                                    {{ is_null($article->category) ? '' : 'selected'}}

                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="selectTag" class="form-label">Select category</label>
                        <select multiple name="tags[]" id="selectTag"  class="form-select">
                            @foreach($tags as $tag)
                                <option
                                    @foreach($article->tags as $articleTag)
                                        {{ $tag->id === $articleTag->id ? ' selected ' : ''}}
                                    @endforeach

                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="articleDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="articleDescription" rows="2">{{ $article->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Image</label>
                        <input type="text" value="{{ $article->image }}" name="image" class="form-control" id="articleImage" aria-describedby="articleImage">
                        <div id="articleTitle" class="form-text">We'll never share your image with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="articleContent" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="articleContent" rows="5">{{ $article->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

