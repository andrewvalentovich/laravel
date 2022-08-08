@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row py-5">
            <h1>Index page</h1>
            <div class="list-group pt-5">
                @foreach($articles as $article)
                    <a href="{{ route('articles.show', ['article' => $article->id]) }}"
                       class="list-group-item list-group-item-action"
                       aria-current="true"
                    >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><span class="text-primary">{{ $article->id }} </span>{{ $article->title }}</h5>
                            <small>{{ $article->created_at }}</small>
                        </div>
                        <small>Category: {{ is_null($article->category) ? 'None' : $article->category->name }}</small>
                        <div class="d-flex">
                            <small>
                                @foreach($article->tags as $tag)
                                        {{ $tag->name }}
                                @endforeach
                            </small>
                        </div>
                        <p class="mb-1">{{ $article->description }}</p>
                    </a>
                @endforeach
            </div>
            <div class="pt-5">
                {{ $articles->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

